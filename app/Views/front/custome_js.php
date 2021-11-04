<!-----Alert Message Show script ------>
<div id="messages" class="hide" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <div id="messages_content"></div>
</div>
<!-----Alert Message Show script ------>




<script>
    function add_to_Cart(id){
         $.ajax({
            type:'ajax',
            method:'GET',
            url:'<?= site_url('Shop/add_to_cart/'); ?>'+id,
           
            success:function(data){
                if (data == "1") {
                   $('#messages').removeClass('hidden').addClass('alert alert-success ');
                    $('#messages_content').html('Product Added to Your Cart Successfully');
                    location.reload();
                     calculate_carts_product();
                    //Show cart modal function in frontent
                     //Show cart modal function in frontent
                }else{
                    $('#messages').removeClass('hidden').addClass('alert alert-danger ');
                    $('#messages_content').html('Failed ! Sorry Unable to added Carts!');
                 
                }
            },
            error:function(){
                alert('Error! Technical Issue Contact with Administrator');
            }

        });
    }
    
    //Calculate Carts Product Script
    calculate_carts_product(); 
    function calculate_carts_product(){
        $.ajax({
            type:'ajax',
            method:'GET',
            url:'<?= base_url('Shop/calculate_carts_products/'); ?>',
          
            success:function(data){
                var json_data = JSON.parse(data);
                $('#total_products').html(json_data.total_products);
                $('#total_amount').html(json_data.total_amount);
                 // location.reload();
            },
            error:function(){
                 //alert('Error! Technical Issue Contact with Administrator');
            }
        });
    }
    //Calculate Carts Product Script
    
   
       //Update Quantity Script Start 
    function update_quantity(type,id){
        let qname   = "quantity_" +id;
        let quantity  = $('input[name="'+qname+'"]').val();
        // alert(quantity);
        $.ajax({
            type:'ajax',
            method:'GET',
            url:'<?= site_url('Shop/update_quantity/'); ?>'+quantity+'/'+type+ '/'+id,
           
            success:function(data){
                if (data == "1") {
                    alert('Success !Product Quantity Updated');
                    location.reload();
                    window.location.href=window.location.href;
                }else{
                 alert('Failed !Unable to Update Quantity');
                    
                }
            },
            error:function(){
                alert('Error! Technical Issue Contact with Administrator');
            }

        });
    }
    //Update Quantity Script Start
    
   function delete_item_in_carts(id, is_type){
       confirm('Are you sure you want to  delete Products ?..');
         $.ajax({
            type:'ajax',
            method:'GET',
            url:'<?= site_url('Shop/delete_item_in_carts/'); ?>'+id,
            success:function(data){
                if (data==1) {
                    if(is_type==='load'){
                        alert('Success ! Item Deleted Succesfully ');
                        window.location.href=window.location.href;
                    }else{
                       alert('Success ! Item Deleted Succesfully ');
                       location.reload();
                    }
                }else{
                    alert('Failed ! Sorry Unable to Deleted');
                }
            },
            error:function(){
                // alert('Error! Technical Issue Contact with Administrator');
            }
        });
    }
    
   
    
</script>

<script type="text/javascript">

//Booked Appointment Script
$('#bookappointment').on('submit', function(e){
	e.preventDefault();
	var doctor = $('#doctor').val();
	var mobile_number = $('#mobile').val();
    var mobile_number_len = $('#mobile').val().length;
    var email = $('#email').val();
	if (doctor == "") {
		$('#doctor').css({'border':'1px solid red'});
	}
	else if (mobile_number_len !== 8) {
    	alert('Please Enter 8 Digit Mobile Number')
    }
    else if (!ValidateEmail($("#email").val())) {
		alert('Please Enter Valid Email');
	}else{
		$.ajax({
			url:'<?= site_url('Home/bookappointment'); ?>',
			method:'POST',
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
    		success:function(result){
			     let data = $.parseJSON(result);
			    if (data.is_error == 'yes') {
                   /* $('#errormodal').modal('show');
                    $('#error_heading').text(data.dd);*/
                    alert(data.dd);
                }
                if (data.is_error== 'no') {
                    if (data.paymentLink != "") {
                        window.location.href = data.paymentLink;
                    }
                }
			},
			error:function(){
				alert('Error!Appointment Booking');
			}
		});
	}
});
//Booked Appointment Script








//Dependence Doctor FEE Script Section Start
$(document).ready(function(){
 	$('#doctor').change(function(){
 	    var id=$(this).val();
 	    $('#doctorschid').val(id);
        $('#doctor_fee_box').val();
        
        $.ajax({
            url : '<?php echo site_url('Home/getdoctorfee/');?>'+id,
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success: function(data){
                if(data){
                    $('#doctor_fee_box').val('Consultancy Fee:'+data);
                }
            }
        });
     }); 
});



 $(document).ready(function(){
 	$('#bookingdate').change(function(){ 
        var date=$(this).val();
        let id = $('#doctorschid').val();
        
        $.ajax({
            url : '<?php echo site_url('Home/getschedulelistdatevise/');?>'+id+ '/'+date,
            method : "POST",
            data : {id: id, date:date},
            async : true,
            dataType : 'json',
            success: function(data){
                if(data){
                    console.log(data);
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(data[i].status =="UnAvailable"){
                            html += '<option value="">'+data[i].booking_date+' - '+data[i].schedule_time+' - <span class="badge badge-primary" style="background-color:green">UnAvailable </span></option>';
                        }else{
                            var shdldate = new Date(data[i].booking_date).toDateString();
                            html += '<option value='+data[i].id+'>'+shdldate+' - '+data[i].schedule_time+' - <span class="badge badge-primary" style="background-color:green">Available</span></option>';
                        }
                        
                    	$('#schdatethrowshow').html(html);
                    }
                }else{
                   alert('Not Available this Date');
                   $('#schdatethrowshow').html("");
                }
            }
        });
        $('#shcdatebox').fadeIn();
        $('#shcdatebox_2').fadeOut();
        
        return false;
        
    }); 
});

//Dependence Doctor FEE Script Section End




//Email Validation
function ValidateEmail(email){
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return expr.test(email);
}



</script>