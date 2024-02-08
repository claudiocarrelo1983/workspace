<select id="select-team" class="form-control text-3 h-auto " name="Sheddule[team_username]" onclick="bookingGetDateSearch(this)" separator="<br>" aria-required="true" aria-invalid="false">
    <?php foreach($teamMembers as $key => $value){ ?> 
        <option value="<?= $key ?>"><?= $value ?></option>
    <?php } ?>
</select>