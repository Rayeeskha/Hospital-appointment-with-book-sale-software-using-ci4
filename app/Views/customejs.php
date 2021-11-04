<script>
$(document).ready(function() {
	$('#example').DataTable();
	$('.dropdown-toggle').dropdown();
  } );

$(document).ready(function() {
	var table = $('#example2').DataTable( {
		lengthChange: false,
		buttons: [ 'copy', 'excel', 'pdf', 'print']
	} );
 
	table.buttons().container()
		.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
} );

$('.single-select').select2({
	theme: 'bootstrap4',
	width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
	placeholder: $(this).data('placeholder'),
	allowClear: Boolean($(this).data('allow-clear')),
});
$('.multiple-select').select2({
	theme: 'bootstrap4',
	width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
	placeholder: $(this).data('placeholder'),
	allowClear: Boolean($(this).data('allow-clear')),
});
	
	
	
	//Dependence Doctor Department Script Section Start
  $(document).ready(function(){
 		$('#doctor').change(function(){ 
            var id=$(this).val();
            $.ajax({
                url : '<?= site_url('Admin/get_doctor_department/');?>'+id,
                method : "POST",
                data : {id: id},
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var fee = '';
                    var i;
                    for(i=0; i<data.length; i++){
                    	html += '<option value='+data[i].department_id+'>'+data[i].departmentname+'</option>';
                        fee +=  data[i].fee;
                        $('#cashamount').val('Consultancy Fee:'+fee);
                        $('#department_slct').html(html);
                    }
                    
                  
                }
            });
            return false;
        }); 
        
        
        
//Event Calander Script Start 
$(document).ready(function(){
    var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay'
    },
    events:"<?= site_url('Admin/loadevent'); ?>",
    selectable:true,
    selectHelper:true,
    select:function(start, end, allDay)
    {
        var title = prompt("Enter Event Title");
        if(title)
        {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url:"<?= site_url("Admin/insertivent"); ?>",
                type:"POST",
                data:{title:title, start:start, end:end},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Added Successfully");
                }
            })
        }
    },
    editable:true,
    eventResize:function(event)
    {
        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

        var title = event.title;

        var id = event.id;

        $.ajax({
            url:"<?=  site_url('Admin/updateevenets'); ?>",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function()
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Update");
            }
        })
    },
    eventDrop:function(event)
    {
        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        //alert(start);
        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
        //alert(end);
        var title = event.title;
        var id = event.id;
        $.ajax({
            url:"<?=  site_url('Admin/updateevenets'); ?>",
            type:"POST",
            data:{title:title, start:start, end:end, id:id},
            success:function()
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated");
            }
        })
    },
    eventClick:function(event)
    {
        if(confirm("Are you sure you want to remove it?"))
        {
            var id = event.id;
            $.ajax({
                url:"<?php echo base_url("Admin/deleteevents"); ?>",
                type:"POST",
                data:{id:id},
                success:function()
                {
                    calendar.fullCalendar('refetchEvents');
                    alert('Event Removed');
                }
            })
        }
    }
});
});
        //Event Calander Script End
});
//Dependence Doctor Department Script Section End
	

//Dependence Doctor FEE Script Section Start
$(document).ready(function(){
 	$('#doctor').change(function(){ 
        var id=$(this).val();
        $('#doctorschid').val(id);
        $('#edit_doctor_id').val(id);
    }); 
});
$(document).ready(function(){
 	$('#bookdate').change(function(){ 
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
                           html += '<option value='+data[i].id+'>'+data[i].booking_date+' - '+data[i].schedule_time+' - <span class="badge badge-primary" style="background-color:green">Available</span></option>';
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
        return false;
        
    }); 
});


$(document).ready(function(){
 	$('#editbookdate').change(function(){ 
 	    var date=$(this).val();
        let id = $('#edit_doctor_id').val();
        //alert(id);
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
                           html += '<option value='+data[i].id+'>'+data[i].booking_date+' - '+data[i].schedule_time+' - <span class="badge badge-primary" style="background-color:green">Available</span></option>';
                        }
                        
                    	$('#editschdatethrowshow').html(html);
                    }
                }else{
                   alert('Not Available this Date edit');
                   $('#editschdatethrowshow').html("");
                }
            }
        });
        $('#shcdatebox').fadeIn();
        return false;
        
    }); 
});




//Dependence Doctor Appointment Script Section End



function check_mobile (){
    var mobile_number = $('#mobile').val();
	var mobile_number_len = $('#mobile').val().length;

	if (mobile_number_len == 8) {
	    $('#admin_btn_book_apmnt').prop('disabled',false);
	    $('#mobile_error').hide();
	}else{
	    $('#mobile_error').show();
	    $('#admin_btn_book_apmnt').prop('disabled',true);
	}
}





</script>
//Appointement Dashboard Chart