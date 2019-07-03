<h1>Agenda for <?php echo date("Y-m-d") ?></h1>

<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>

            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Date</th>
                <th>Yesterday</th>
                <th>Today</th>
                <th>Problems</th>
            </tr>
        </thead>
        <?php

        foreach ($agenda as $a) {
            echo '<tr>';
            echo "<td>" . $a['id'] . "</td>";
            echo "<td>" . $a['username'] . "</td>";
            echo "<td>" . $a['date'] . "</td>";
            echo "<td>" . $a['yesterday'] . "</td>";
            echo "<td>" . $a['today'] . "</td>";
            echo "<td>" . $a['problems'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>
    <a href="/daily-scrum/agenda/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add agenda for today</a>
</div>