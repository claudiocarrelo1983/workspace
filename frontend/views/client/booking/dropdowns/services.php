<select id="select-service" class="form-control text-3 h-auto " name="Sheddule[service_code]"  onclick="bookingGetTeam(this)" aria-required="true">
    <?php foreach($arrServices as $key => $value){ ?> 
        <option value="<?= $key ?>"><?= $value ?></option>
    <?php } ?>
</select>