<?php

    /** @var $employee ?\App\Model\Employee */
?>

<div class="form-group">
    <label for="name">Imię</label>
    <input type="text" id="name" name="employee[name]" value="<?= $employee ? $employee->getName() : '' ?>">

</div>
<div class="form-group">
    
<label for="lastname">Nazwisko</label>
    <input type="text" id="lastname" name="employee[lastname]" value="<?= $employee ? $employee->getLastName() : '' ?>">
</div>



<div class="form-group">
    <label for="position">Stanowisko</label>
    <input type="text" id="position" name="employee[position]" value="<?= $employee? $employee->getPosition() : '' ?>">
</div>

<div class="form-group">
    <label for="schedule">Plan zajęć</label>
    <input type="text" id="schedule" name="employee[schedule]" value="<?= $employee? $employee->getSchedule() : '' ?>">
</div>

<div class="form-group">
    <label></label>
    <input type="submit" value="Dodaj">
</div>