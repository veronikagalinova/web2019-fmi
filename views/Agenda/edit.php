<h1>Edit today's agenda
    <?php
    echo  date('Y-m-d');
    ?></h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="yesterday">Yesterday:</label>
        <input type="text" class="form-control" id="yesterday" value="<?php
                                                                        echo  $agenda['yesterday'];
                                                                        ?>" name="yesterday">
    </div>
    <div class="form-group">
        <label for="today">Today:</label>
        <input type="text" class="form-control" id="today" name="today" value="<?php
                                                                                echo  $agenda['today'];
                                                                                ?>">
    </div>
    <div class="form-group">
        <label for="problems">Problems:</label>
        <input type="text" class="form-control" id="problems" name="problems" value="<?php
                                                                                        echo  $agenda['problems'];
                                                                                        ?>">
    </div>
    <button onclick="window.location.href='/daily-scrum/agenda/index'" type="submit" class="btn btn-primary">Cancel</button>
    <button type="submit" name="edit-agenda" class="btn btn-primary">Submit</button>
</form>