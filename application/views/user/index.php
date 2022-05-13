<!DOCTYPE html>
<html lang="en">
<head>
	<title>List User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
	<h2>Danh sách người dùng</h2>
	<a href="<?= base_url('user/creat')?>e" class="btn btn-success mb-4"> Add</a>
	<table class="table table-bordered">
		<thead>
		<tr>
			<th>#</th>
			<th>Fullname</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th width="15%">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($users as $item): ?>

			<tr>
				<td> <?= $item->id ?> </td>
				<td> <?= $item->name ?> </td>
				<td> <?= $item->email ?> </td>
				<td> <?= $item->phone ?> </td>
				<td> <?= $item->address ?> </td>
				<td>
					<a href="<?= base_url("/user/{$item->id}/edit")?>" class="btn btn-sm btn-warning">Edit</a>
					<a href="<?= base_url("/user/{$item->id}/delete")?>" class="btn delete-user btn-sm btn-danger">Remove</a>
				</td>
			</tr>

		<?php endforeach; ?>

		</tbody>
	</table>

	<script>
		<?php if($this->session->flashdata('message')): ?>
			alert('<?= $this->session->flashdata('message')  ?>')
		<?php endif; ?>

		document.querySelectorAll(".delete-user").forEach((item)=>{
			item.addEventListener("click",function (event){
				event.preventDefault();
				var url = event.target.getAttribute("href");
				if (confirm("Bạn có chắc muốn xóa không ?")){
					location.href = url;
				}
			})
		})
	</script>
</div>

</body>
</html>
