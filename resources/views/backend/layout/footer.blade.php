	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
		const anElement = new AutoNumeric('#autonumberic','integer');

	</script>
	<script type="text/javascript">
											CKEDITOR.replace( 'description', {
								        filebrowserBrowseUrl: '{{ asset('backend/editor/ckfinder/ckfinder.html') }}',
								        filebrowserImageBrowseUrl: '{{ asset('backend/editor/ckfinder/ckfinder.html?type=Images') }}',
								        filebrowserFlashBrowseUrl: '{{ asset('backend/editor/ckfinder/ckfinder.html?type=Flash') }}',
								        filebrowserUploadUrl: '{{ asset('backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
								        filebrowserImageUploadUrl: '{{ asset('backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
								        filebrowserFlashUploadUrl: '{{ asset('backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
								    } );
										</script>	
</body>

</html>