<h1>Add agenda for today</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="yesterday">Yesterday</label>
        <input type="text" class="form-control" id="yesterday" placeholder="Enter yesterday's tasks" name="yesterday" required>
    </div>
    <div class="form-group">
        <label for="today">Today:</label>
        <input type="text" class="form-control" id="today" placeholder="Enter today's tasks" name="today" required>
    </div>
    <div class="form-group">
        <label for="problems">Problems:</label>
        <input type="text" class="form-control" id="problems" placeholder="Problems?" name="problems">
    </div>
    <button type="submit" class="btn btn-primary" name="create-agenda">Add</button>
</form>