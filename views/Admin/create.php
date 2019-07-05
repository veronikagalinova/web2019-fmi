<form method="post" action=''>
    <div class="form-group">
        <label for="projectName">Project name</label>
        <input type="text" class="form-control" id="projectName" name="project-name" required>
    </div>
    <div class="form-group">
        <label for="projectDescription">Project description</label>
        <textarea class="form-control" id="projectDescription" rows="3" name="project-description" maxlength="50"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="create-project" value="Create project">
</form>