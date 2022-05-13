<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
	<form action="<?= base_url("/user/{$user->id}/update")?>" method="post">
		<div class="mb-3 mt-3">
			<label for="name" class="form-label">Name:</label>
			<input type="text" class="form-control" id="name" value="<?= $user->name?>" placeholder="Enter name" name="name">
		</div><div class="mb-3 mt-3">
			<label for="email" class="form-label">Email:</label>
			<input type="text" class="form-control" id="email" value="<?= $user->email?>" placeholder="Enter email" name="email">
		</div>
		<div class="mb-3 mt-3">
			<label for="email" class="form-label">Phone:</label>
			<input type="text" class="form-control" id="phone" value="<?= $user->phone?>" placeholder="Enter phone" name="phone">
		</div>
		<div class="mb-3">
			<label for="address" class="form-label">Address:</label>
			<input type="text" class="form-control" id="address" value="<?= $user->address?>" placeholder="Enter address" name="address">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<script>
		<?php if($this->session->flashdata('message')): ?>
		alert('<?= $this->session->flashdata('message')  ?>')
		<?php endif; ?>
	</script>
</div>

</body>
</html>
