
    <h2>Edit User</h2>
    <form action="/user/update/<?php echo $user['id_user']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br>
        <br>
        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="nomor_telepon" id="nomor_telepon" name="nomor_telepon" value="<?php echo $user['nomor_telepon']; ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/user/index">Back to List</a>