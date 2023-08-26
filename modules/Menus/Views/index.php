<form method="post" id="add_menu_item" action="<?php echo site_url('menus') ?>">
    <div class="form-group">
        <label>Parent</label>
        <select name="parent" id="parent">
            <option value="0">Root</option>
            <option value="1">Menu 1</option>
            <option value="2">Menu 2</option>
            <option value="3">Menu 3</option>
        </select>
    </div>
    <div class="form-group">
        <label>Active</label>
        <select name="active" id="active">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
    <div class="form-group">
        <label>Icon</label>
        <input type="text" name="icon" class="form-control">
    </div>
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label>Route</label>
        <input type="text" name="route" class="form-control">
    </div>
    <div class="form-group">
        <label>Role</label>
        <select name="role" id="role">
            <option value="1">Admin</option>
            <option value="2">Member</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
    </div>
</form>