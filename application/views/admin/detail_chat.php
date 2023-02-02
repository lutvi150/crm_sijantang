<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Chat Anda

		</h1>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">



				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Chat Admin</h3>
					</div>
					<!-- /.box-header -->

					<div class="box-body">


						<div class="col-md-12">
							<!-- DIRECT CHAT -->
							<div class="box box-warning direct-chat direct-chat-warning">
								<div class="box-header with-border">
									<h3 class="box-title">Direct Chat</h3>


								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<!-- Conversations are loaded here -->
									<div class="direct-chat-messages">

									</div>
									<!--/.direct-chat-messages-->

								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<form action="#" method="post">
										<div class="input-group">
											<input type="text" name="message" placeholder="Type Message ..." class="form-control">
											<span class="input-group-btn">
												<button type="button" onclick="send_message()" class="btn btn-warning btn-flat">Send</button>
											</span>
										</div>
									</form>
								</div>
								<!-- /.box-footer-->
							</div>
							<!--/.direct-chat -->
						</div>
						<!--/.direct-chat -->
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<script>
	let baseUrl = `<?=base_url();?>`;
	let id_user='<?=$id_user?>';
	$(document).ready(function () {
		get_chat();
	});

	function get_chat() {
		$.ajax({
			type: "POST",
			url: baseUrl + "/admin/get_chat",
			data:{id_user:id_user},
			dataType: "JSON",
			success: function (response) {
				let chat=[];
				$.each(response, function (index, value) {

					if (value.sumber=='admin') {
						chat+=`<div class="direct-chat-msg right">
											<div class="direct-chat-info clearfix">
												<span class="direct-chat-name pull-left">Admin</span>
												<span class="direct-chat-timestamp pull-right">${value.tanggal_chat}</span>
											</div>
											<img class="direct-chat-img" src="<?=base_url();?>assets/images/icon-admin.png"
												alt="message user image">
											<div class="direct-chat-text">
												${value.chat}
											</div>
										</div>
`
					}else{
						chat+=`
										<div class="direct-chat-msg">
											<div class="direct-chat-info clearfix">
												<span class="direct-chat-name pull-right">${value.nama}</span>
												<span class="direct-chat-timestamp pull-left">${value.tanggal_chat}</span>
											</div>
											<img class="direct-chat-img" src="<?=base_url()?>${value.foto}" alt="message user image">
											<div class="direct-chat-text">
												${value.chat}
											</div>
										</div>`
					}
				});
				$(".direct-chat-messages").html(chat);
			},
			error: function () {
				Swal.fire('Something went wrong');
			}
		});
	}

	function send_message() {
		$.ajax({
			type: "POST",
			url: baseUrl + "/admin/store_chat",
			data: {
				chat: $("input[name=message]").val(),
				id_user:id_user,
			},
			dataType: "JSON",
			success: function (response) {
				$("input[name=message]").val('');
				get_chat();
			},
			error: function () {
				Swal.fire('Something went wrong');
			}
		});
	}

</script>
