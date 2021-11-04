<!-- Bootstrap JS -->
<script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>
<!--plugins-->
<script src="<?= base_url('public/assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('public/assets/plugins/simplebar/js/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('public/assets/plugins/metismenu/js/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('public/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js'); ?>"></script>
<script src="<?= base_url('public/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js'); ?>"></script>
<script src="<?= base_url('public/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!--Chart js file --->
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="<?= base_url('public/assets/js/index.js'); ?>"></script>
<!--app JS-->
<script src="<?= base_url('public/assets/js/app.js'); ?>"></script>
<script src="<?= base_url('public/assets/plugins/datatable/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('public/assets/plugins/datatable/js/dataTables.bootstrap5.min.js'); ?>"></script>

<script src="<?= base_url('public/assets/plugins/select2/js/select2.min.js'); ?>"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$('#AppointmentSettingFrm').on('submit', function(e){
	e.preventDefault();
	$.ajax({
			url:'<?= site_url('Admin/docsettingperiod'); ?>',
			method:'POST',
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
    		success:function(result){
    			console.log(result);
			     let data = $.parseJSON(result);
			    if (data.is_error == 'yes') {
                   /* $('#errormodal').modal('show');
                    $('#error_heading').text(data.dd);*/
                    alert(data.dd);
                }
                if (data.is_error== 'no') {
                    alert(data.dd);
                    /*$('#successmodal').modal('show');
                    $('#success_heading').text(data.dd);*/
                    location.reload();
                }
			},
			error:function(){
				alert('Error!Appointment Booking');
			}
		});
});



$('#UpdateScheduleFrm').on('submit', function(e){
	e.preventDefault();
	let schedule_id= $('#setting_sch_id').val();
	$.ajax({
		url:'<?= site_url('Admin/updatedoctorschedule/'); ?>'+schedule_id,
		method:'POST',
		data:new FormData(this),
		contentType:false,
		cache:false,
		processData:false,
		success:function(result){
			console.log(result);
		     let data = $.parseJSON(result);
		    if (data.is_error == 'yes') {
                $('#errormodal').modal('show');
                $('#error_heading').text(data.dd);
                alert(data.dd);
            }
            if (data.is_error== 'no') {
                alert(data.dd);
               location.reload();
                window.location.href = '<?= base_url('Admin/apmntsettings'); ?>';
            }
		},
		error:function(){
			alert('Error!Appointment Booking');
		}
	});
});



$(document).ready(function(){
      $.ajax({
          type:'ajax',
          method:'GET',
          url:'<?= base_url('Home/getevents/'); ?>',
          success:function(holidays){
            console.log(holidays);
            //var holidays = ["2021-06-22","2021-06-25","2021-06-28"];
            $('#bookdate').datepicker({
               minDate:0,
            beforeShowDay:function(date){

              var day = date.getDay();
              if (day == 0) {
                return [false, "markholiday" ];
              }else{
                var formattedDate = $.datepicker.formatDate("yy-mm-dd", date);
                if (holidays.indexOf(formattedDate)== -1) {
                  return [true];
                }else{
                  return [false,"markholiday"];
                }
              }
            }
          });
            
          },
          
      });
   
  });




$(document).ready(function(){
    $.ajax({
          type:'ajax',
          method:'GET',
          url:'<?= base_url('Home/getevents/'); ?>',
          success:function(holidays){
            console.log(holidays);
            //var holidays = ["2021-06-22","2021-06-25","2021-06-28"];
            $('.admindatepickerup').datepicker({
               minDate:0,
               showButtonPanel: true,
              dateFormat: 'yy-mm-dd',
            beforeShowDay:function(date){

              var day = date.getDay();
              if (day == 0) {
                return [false, "markholiday" ];
              }else{
                var formattedDate = $.datepicker.formatDate("yy-mm-dd", date);
                if (holidays.indexOf(formattedDate)== -1) {
                  return [true];
                }else{
                  return [false,"markholiday"];
                }
                //return [true,  (holidays.indexOf(formattedDate)== -1)?"":"markholiday[false]"];
              }
            }
          });
            
          },
          
      });
  	});


</script>


<?= view('customejs'); ?>


