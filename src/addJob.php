<div class="job-form">
<form action="processAdd.php" method="post">
    <div class="job-input-cont">
        <input class="addInput" name="jobName" placeholder="Enter New Job" required>
        <p>Enter a new job i.e. <em>Buy milk, Wash clothes</em> etc.</p>
    </div>
    <div class="cat-input-cont">
        <input class="addInput" name="jobCategory" placeholder="Enter Job Category">
        <p>Add a job category i.e. <em>Household, Grocery shopping</em> etc.</p>
    </div>
   <div class="date-input-cont">
        <input class="addInput" type="datetime-local" name="jobDue">
        <p>Add a due date and time for your job.</p>
   </div>
    <!-- <input class="addInput" type="date" name="jobAdded" placeholder="Date Added"> -->
    
    <button class="cta"><i class="fa fa-plus"></i><span class="button-text">Add Job</span></button>
</form>
</div>
