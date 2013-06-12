<!-- Start General Information -->
<?php echo form_open('en/service/non-ground-handling/211/gapura-hospitality-service/form');?>
<h2>General Information (Part 1 of 3)</h2>
              <label for="res-gen-name">Name:</label>
              <input type="text" class="form-text" id="hs_name" name="hs_name"/>
              <label for="res-gen-email">Email address:</label>
              <input type="text" class="form-text" id="hs_email" name="hs_email"/>
			  <label for="res-gen-phone">Contact number:</label>
			  <input type="text" class="form-text" id="hs_phone" name="hs_phone" />
			  <label for="res-gen-phone">Service for:</label>
			  <input type="radio" id="hs_type" name="hs_type" value="Departure" /><h5>Departure</h5>
			  <input type="radio" id="hs_type" name="hs_type" value="Arrival" /><h5>Arrival</h5>
			  <br/>
			  <input type="submit" name="visual-form-builder-submit" value="next" class="submit" id="next" />
</form>
<!-- End General Information -->