<!-- Start Arrival Information -->
<?php
	echo form_open('en/service/non-ground-handling/211/gapura-hospitality-service/last');
	echo form_hidden('hs_name', $hs_name);
	echo form_hidden('hs_email', $hs_email);
	echo form_hidden('hs_phone', $hs_phone);
	echo form_hidden('hs_type', $hs_type);
?>
 <h2>Arrival (Part 2 of 3)</h2>
	<label for="">Service Site:</label>
       <select name="hs_service_site" id="hs_service_site" class="select">
                                	<option value='DPS'>Denpasar</option>
                                	<option value='CGK'>Cengkareng</option>
                                	<option value='SUB'>Surabaya</option>
                                	<option value='PLM'>Palembang</option>
                                	<option value='MES'>Medan</option>
                                  </select>
    <br/>
	 <label for="res-dep-pickup">Local Address:</label>
      <textarea name="hs_local_adress" id="hs_local_adress" class="form-textarea" cols="50" rows="3"></textarea>
      <label for="res-dep-booking">Flight booking code:</label>
      <input type="text" class="form-text" id="hs_flight_book_code" name="hs_flight_book_code" value="" />
      <label for="res-dep-date">Arrival date:</label>
      <input type="text" class="form-text datepicker" id="hs_date" name="hs_date" value="" /> <h6>date format (dd-mm-yyyy)</h6>
	  <label for="res-dep-date">Arrival time: (hh:mm AM/PM) Local Time</label>
      <select name="hs_hour" id="hs_hour" class="select">
                                	<option value='01'>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>
                                  </select>&nbsp;:&nbsp;
                                  <select name="hs_minute" id="hs_minute" class="select">
                                  	<option value='00'>00</option><option value='05'>05</option><option value='10'>10</option><option value='15'>15</option><option value='20'>20</option><option value='25'>25</option><option value='30'>30</option><option value='35'>35</option><option value='40'>40</option><option value='45'>45</option><option value='50'>50</option><option value='55'>55</option>
                                  </select>
                                  <span class="time">
                                  <select name="hs_ampm" id="hs_ampm" class="select">
                                  	<option value="AM">AM</option><option value="PM">PM</option>
                                  </select>
      <label for="res-dep-airline">Airline:</label>
      <select name="hs_airline" class="form-select" id="hs_airline">
        <option value="">--- Select airline ---</option>        
       <option value="AIR ASIA INDONESIA" title="QZ">AIR ASIA INDONESIA</option>
	   <option value="AIR ASIA MALAYSIA" title="AK">AIR ASIA MALAYSIA</option>
	   <option value="AIR ASIA THAI" title="FD">AIR ASIA THAI</option>
	   <option value="AIR CHINA" title="CA">AIR CHINA</option>
	   <option value="ALL NIPPON AIRWAYS" title="NH">ALL NIPPON AIRWAYS</option>
	   <option value="ALWAFEER AIR" title="AW">ALWAFEER AIR</option>
	   <option value="BATAVIA AIR" title="Y6">BATAVIA AIR</option>
	   <option value="CATHAY PACIFIC" title="CX">CATHAY PACIFIC</option>
	   <option value="CEBU PACIFIC" title="5J">CEBU PACIFIC</option>
	   <option value="CHINA AIRLINES" title="CI">CHINA AIRLINES</option>
	   <option value="CHINA EASTERN AIRLINES" title="MU">CHINA EASTERN AIRLINES</option>
	   <option value="CHINA SOUTHERN" title="CZ">CHINA SOUTHERN</option>
	   <option value="CITILINK" title="GA">CITILINK</option>
	   <option value="EMIRATES AIRLINES" title="EK">EMIRATES AIRLINES</option>
	   <option value="ETIHAD AIRWAYS" title="EY">ETIHAD AIRWAYS</option>
	   <option value="EVA AIR" title="BR">EVA AIR</option>
	   <option value="EXPRESS AIR" title="XN">EXPRESS AIR</option>
	   <option value="GARUDA INDONESIA" title="GA">GARUDA INDONESIA</option>
	   <option value="JAPAN AIRLINES" title="JL">JAPAN AIRLINES</option>
	   <option value="JET STAR AIRWAYS" title="JQ">JET STAR AIRWAYS</option>
	   <option value="JSC TRANSAERO AIRLINES" title="UN">JSC TRANSAERO AIRLINES</option>
	   <option value="KARTIKA AIRLINE" title="3Y">KARTIKA AIRLINE</option>
	   <option value="KLM ROYAL DUTCH AIRLINES" title="KL">KLM ROYAL DUTCH AIRLINES</option>
	   <option value="KOREA AIRLINES" title="KE">KOREA AIRLINES</option>
	   <option value="KUWAIT AIRWAYS" title="KU">KUWAIT AIRWAYS</option>
	   <option value="LION AIR" title="JT">LION AIR</option>
	   <option value="LUFTHANSA AIRLINES" title="LH">LUFTHANSA AIRLINES</option>
	   <option value="MALAYSIA AIRLINE" title="MH">MALAYSIA AIRLINE</option>
	   <option value="MANDALA AIRLINES" title="RI">MANDALA AIRLINES</option>
	   <option value="MERPATI NUSANTARA" title="MZ">MERPATI NUSANTARA</option>
	   <option value="MIHIN LANKA (PRIVATE)" title="MJ">MIHIN LANKA (PRIVATE)</option>
	   <option value="PHILIPPINES AIRLINES" title="PR">PHILIPPINES AIRLINES</option>
	   <option value="PREMIAIR" title="PA">PREMIAIR</option>
	   <option value="QANTAS AIRWAYS" title="QF">QANTAS AIRWAYS</option>
	   <option value="QATAR AIRWAYS" title="QR">QATAR AIRWAYS</option>
	   <option value="ROYAL BRUNEI AIRLINE" title="BI">ROYAL BRUNEI AIRLINE</option>
	   <option value="SAUDI ARABIAN AIRLINES" title="SV">SAUDI ARABIAN AIRLINES</option>
	   <option value="SILK AIR" title="MI">SILK AIR</option>
	   <option value="SINGAPORE AIRLINES" title="SQ">SINGAPORE AIRLINES</option>
	   <option value="SKYWEST AIRLINES" title="XR">SKYWEST AIRLINES</option>
	   <option value="SRIWIJAYA AIRLINES" title="SJ">SRIWIJAYA AIRLINES</option>
	   <option value="STRATEGIC AIRLINES" title="VC">STRATEGIC AIRLINES</option>
	   <option value="THAI AIRWAYS" title="TG">THAI AIRWAYS</option>
	   <option value="TIGER AIRWAYS" title="TR">TIGER AIRWAYS</option>
	   <option value="TRANSAERO" title="UN">TRANSAERO</option>
	   <option value="TURKISH AIRLINES" title="TK">TURKISH AIRLINES</option>
	   <option value="VALUAIR" title="VF">VALUAIR</option>
	   <option value="VIRGIN / PACIFIC BLUE AIRLINES" title="DJ">VIRGIN / PACIFIC BLUE AIRLINES</option>
	   <option value="VIVA MACAU" title="ZG">VIVA MACAU</option>
	   <option value="WINGS AIR" title="IW">WINGS AIR</option>
	   <option value="YEMEN AIRWAYS" title="IY">YEMEN AIRWAYS</option>      </select>
      <label for="res-dep-flightnum" >Flight number:</label><input type="text" class="form-text" id="hs_flight_number" name="hs_flight_number" value="" />
      <label for="res-dep-number">Number of travellers:</label>
      <select name="hs_num_traveler" class="form-select" id="hs_num_traveler">
          <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option><option value='32'>32</option><option value='33'>33</option><option value='34'>34</option><option value='35'>35</option><option value='36'>36</option><option value='37'>37</option><option value='38'>38</option><option value='39'>39</option><option value='40'>40</option><option value='41'>41</option><option value='42'>42</option><option value='43'>43</option><option value='44'>44</option><option value='45'>45</option><option value='46'>46</option><option value='47'>47</option><option value='48'>48</option><option value='49'>49</option><option value='50'>50</option>      </select>
      <label for="res-dep-instructions">Special instructions:</label>
      <textarea name="hs_special_instruction" id="hs_special_instruction" class="form-textarea" cols="50" rows="3"></textarea>
	  <br/>
	  <input type="submit" name="visual-form-builder-submit" value="next" class="submit" id="next" />
<!-- End Arrival Information -->   