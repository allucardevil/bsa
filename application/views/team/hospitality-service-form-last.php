<!-- Start General Information -->
 <h2>Traveller ID (Part 3 of 3)</h2>
 <?php 
	echo form_open('en/send_mail/');
	echo form_hidden('hs_name', $hs_name);
	echo form_hidden('hs_email', $hs_email);
	echo form_hidden('hs_phone', $hs_phone);
	echo form_hidden('hs_type', $hs_type); 
	echo form_hidden('hs_service_site', $hs_service_site); 
	echo form_hidden('hs_local_address', $hs_local_address); 
	echo form_hidden('hs_flight_book_code', $hs_flight_book_code); 
	echo form_hidden('hs_date', $hs_date); 
	echo form_hidden('hs_hour', $hs_hour); 
	echo form_hidden('hs_minute', $hs_minute); 
	echo form_hidden('hs_ampm', $hs_ampm); 
	echo form_hidden('hs_airline', $hs_airline); 
	echo form_hidden('hs_flight_number', $hs_flight_number); 
	echo form_hidden('hs_num_traveler', $hs_num_traveler); 
	echo form_hidden('hs_special_instructions', $hs_special_instructions); 
?>
<table width="100%" border="0" id="depTable">
<?php for ($i = 1; $i <= $hs_num_traveler; $i++)
{?>
        <thead>
          <tr>
            <th><label>No.</th>
            <th><label>Full name</th>
            <th><label>Place of birth</th>
            <th><label>Date of birth</th>
            <th><label>Nationality</th>
            <th><label>Gender</th>
		  </tr>
		</thead>
		 <tbody>
        	          <tr>
            <td><label><?php echo $i;?></td>
            
            <td><input type="text" name="hs_tr_name_<?php echo $i?>" class="form-text" /></td>
            <td><input type="text" name="hs_tr_place_birth_<?php echo $i?>" class="form-text" /></td>
            <td><input type="text" name="hs_tr_birth_<?php echo $i?>" class="form-text" /></td>
            <td><input type="text" name="hs_tr_nationality_<?php echo $i?>" class="form-text" /></td>
			<td>
              <select name="hs_tr_gender_<?php echo $i?>" class="form-select">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </td>
		 </tbody>
		 <thead>
			<th></th>
            <th><label>Occupation</th>
            <th><label>Passport/ ID Number</th>
            <th><label>Place of issue</th>
            <th><label>Date of expiry</th>
		 </thead>
		 <tbody>
			<td></td>
		  <td><input type="text" name="hs_tr_occupation_<?php echo $i?>" class="form-text" /></td>
            <td><input type="text" name="hs_tr_passport_<?php echo $i?>" class="form-text" /></td>
            <td><input type="text" name="hs_tr_issue_<?php echo $i?>" class="form-text" /></td>
            <td><input type="text" name="hs_tr_expired_<?php echo $i?>" class="form-text" /></td>
		 </tbody>
		 <thead>
			<th></th>
            <th><label>Country of residence</th>
            <th><label>Last place/port of embarkation</th>
            <th></th>
          </tr>        
        </thead>
        <tbody>
        	          <tr>
            <td></td>
            <td><input type="text" name="hs_tr_resident_<?php echo $i?>" class="form-text" /></td>
            <td><input type="text" name="hs_tr_last_port_<?php echo $i?>" class="form-text" /></td>
          </tr>
		  <tr><td colspan="6">------------------------------------------------------------------------------------------------------------------------</tr>
		<?php }?>
          
                    <tr>
            <td colspan="13" style="text-align:right;"><?php echo form_submit('Sent','Sent');?></td>
          </tr>
        </tbody>
      </table>
<?php echo form_close();?>
<!-- End General Information -->