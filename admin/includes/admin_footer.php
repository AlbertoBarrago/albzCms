</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- mainJS JavaScript -->
<script src="js/main_admin.js"></script>

</script>

<script>
	
	$('document').ready(function(){
		
		$('.delete_modal').on('click', function(){
			
			var id = $(this).attr("rel");
			var delete_url = "posts.php?delete="+ id +" ";
			
			$(".modal-delete_link").attr('href', delete_url);
			
			$('#myModal').modal('show');
			
		})
		
	})
	
</script>	

</body>

</html>
