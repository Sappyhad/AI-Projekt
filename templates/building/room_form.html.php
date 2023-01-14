<?php

    /** @var $room ?\App\Model\Room */
?>

<div class="form-group">
    <label for="name">Numer sali</label>
    <input type="text" id="name" name="room[name]" value="<?= $room ? $room->getName() : '' ?>">

</div>
<div class="form-group">
    
<label for="teachername">Imię Prowadzącego</label>
    <input type="text" id="teachername" name="room[teachername]" value="<?= $room ? $room->getTeacherName() : '' ?>">
</div>



<div class="form-group">
    <label for="teacherlastname">Nazwisko Prowadzącego</label>
    <input type="text" id="teacherlastname" name="room[teacherlastname]" value="<?= $room? $room->getTeacherLastName() : '' ?>">
</div>

<div class="form-group">
    <label for="linktosubjects">Plan zajęć</label>
    <input type="text" id="linktosubjects" name="room[linktosubjects]" value="<?= $room? $room->getLinkToSubjects() : '' ?>">
</div>

<div class="form-group">
    <label></label>
    <input type="submit" value="Dodaj">
</div>