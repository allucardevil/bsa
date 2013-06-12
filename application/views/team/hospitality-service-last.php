<!-- Start General Information -->
<table width="100%" border="0" id="depTable">
        <thead>
          <tr>
            <th>No.</th>
            <th>Full name of traveler</th>
            <th>Gender</th>
            <th>Place of birth</th>
            <th>Date of birth</th>
            <th>Nationality</th>
            <th>Occupation</th>
            <th>Passport/ ID Number</th>
            <th>Place of issue</th>
            <th>Date of expiry</th>
            <th>Country of residence</th>
            <th>Last place/port of embarkation</th>
            <th></th>
          </tr>        
        </thead>
        <tbody>
        	          <tr>
            <td><span class="rowNumber"></span><input type="hidden" name="dep_row[]" class="form-text" value=""/></td>
            
            <td><input type="text" name="dep_name[]" class="form-text" /></td>
            <td>
              <select name="dep_gender[]" class="form-select">
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            </td>
            <td><input type="text" name="dep_place_birth[]" class="form-text" /></td>
            <td><input type="text" name="dep_date_birth[]" class="form-text datepicker-birth readonly" readonly="readonly" /></td>
            <td><input type="text" name="dep_nationality[]" class="form-text" /></td>
            <td><input type="text" name="dep_occupation[]" class="form-text" /></td>
            <td><input type="text" name="dep_passport[]" class="form-text" /></td>
            <td><input type="text" name="dep_place_issue[]" class="form-text" /></td>
            <td><input type="text" name="dep_date_expirity[]" class="form-text datepicker readonly" readonly="readonly" /></td>
            <td><input type="text" name="dep_country_residence[]" class="form-text" /></td>
            <td><input type="text" name="dep_last_place[]" class="form-text" /></td>
            <td><input type="button" value="Delete Row" class="delRow form-button" style="display: none;"></td>
          </tr>
          
                    <tr>
            <td colspan="13" style="text-align:right;"><input type="button" value="Add Row" id="addRowDep" class="addRow form-button"></td>
          </tr>
        </tbody>
      </table>
<!-- End General Information -->