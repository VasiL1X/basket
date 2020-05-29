<template>
    <div>
        <header>
            <div class="basket_shoper_header">
                <div class="container-fluid">
                    <div class="container_shopper">
                        <div class="col-md-4 col-sm-5 col-xs-5">
                            <router-link :to="{ name: 'login' }" title="">
                                <img class="shopper_logo" src="images/logo-normal.png" alt="Basket">
                            </router-link>
                        </div>

                        <div class="col-md-8 col-sm-7 col-xs-7">
                            <div class="right_nav_shop">
                                <div class="navigation right">
                                    <a href="/" class="btn btn-primary btn-sm">Log In</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header-div" style="display: inline-block; width: 100%">
            <div class="col-sm-4">
            </div>
            <div class="text-center">
                <router-link :to="{ name: 'login' }" title="" style="text-align: center">
                    <img class="shopper_logo" src="images/logo-white.png" alt="Basket">
                </router-link>
            </div>
            <div class="text-center float-right-login">
                <div class="right_nav_shop">
                    <div class="navigation right">
                        <a style="color: white; cursor: pointer" class="positions-nav" @click="alreadyHaveAnAccount()">Already
                            have an account?</a>
                        <router-link class="btn btn-primary btn-sm" :to="{ name: 'login' }">
                            Log In
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <section class="order_summary_shopper" id="order_shopper">
            <div class="frame" style="min-height: 870px ;"></div>
            <div class="overlay" style="min-height: 870px ;"></div>
            <div class="darkener" style="min-height: 870px ;"></div>
            <div class="background" style="min-height: 870px ;"></div>
            <div class="shopper_popup" id="p_popup">
                <div class="money_shopping_popu">
                    <div class="order_summary_shopper_comm" style="height: 700px;overflow-y: auto;">
                        <div class="">
                            <div class="from_shop_right">
                                <div class="title title-register">Get paid to shop!</div>
                                <div class="alert alert-danger hide" v-if="applyErrors">
                                    <strong>Error! </strong>
                                    <p style="font-size: 13px" id="validation_msg_shopper"></p>
                                </div>
                                <form onsubmit="return false" class="tab-form attribute_form" id="shoppers_check">
                                    <div class="row" style="margin: 0px !important;">
                                        <div class="col-sm-6 padding-right-left">
                                            <div class="form-group" style="margin-bottom: 10px !important;">
                                                <input v-model="apply.first_name" v-validate="'required'"
                                                       required="required"
                                                       class="form-control" name="first_name" autocorrect="off"
                                                       autofocus="autofocus" placeholder="First Name"
                                                       type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 padding-left-right">
                                            <div class="form-group" style="margin-bottom: 10px !important;">
                                                <input v-model="apply.last_name" name="last_name"
                                                       v-validate="'required'"
                                                       required="required"
                                                       class="form-control" autocorrect="off"
                                                       placeholder="Last Name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 10px !important;">
                                        <input v-model="apply.email" name="email" v-validate="'required'"
                                               class="form-control"
                                               placeholder="Email" type="email" required="required">
                                    </div>
                                    <div class="col-sm-12 padding-left-right">
                                        <div class="form-group form-inline" style="margin-bottom: 10px !important;">
                                            <div class="col-6 form-inline">
                                                <input type="radio" id="male" name="gender" v-model="apply.gender"
                                                       value="Male" class="form-control-sm m-1">
                                                <label for="male">Male</label>
                                            </div>
                                            <div class="col-6 form-inline">
                                                <input type="radio" id="female" name="gender" v-model="apply.gender"
                                                       value="Female" class="form-control-sm m-1">
                                                <label for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 padding-left-right">
                                        <div class="form-group form-inline" style="margin-bottom: 10px !important;">
                                            <div class="col-6 form-inline">
                                                <input type="radio" id="inStore" name="shopperType"
                                                       v-model="apply.shopper_type" value="1"
                                                       class="form-control-sm m-1">
                                                <label for="inStore">Instore</label>
                                            </div>
                                            <div class="col-6 form-inline">
                                                <input type="radio" id="fullService" name="shopperType"
                                                       v-model="apply.shopper_type" value="2"
                                                       class="form-control-sm m-1">
                                                <label for="fullService">Full service</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 10px !important;">
                                        <div class="row" style="margin: 0 0;">
                                            <div class="col-md-6 col-sm-6 col-xs-12 country_drop padding-right-left">
                                                <select style="width: 100%!important;" v-validate="'required'"
                                                        name="country_code" v-model="apply.country_code"
                                                        id="applicant[country_code]"
                                                        class="js-example-disabled-results form-control">
                                                    <option data-countrycode="JO" value="962" selected="">Jordan (+962)
                                                    </option>
                                                    <option disabled="disabled">Other Countries</option>
                                                    <option data-countrycode="DZ" value="213">Algeria (+213)
                                                    </option>
                                                    <option data-countrycode="AD" value="376">Andorra (+376)
                                                    </option>
                                                    <option data-countrycode="AO" value="244">Angola (+244)
                                                    </option>
                                                    <option data-countrycode="AI" value="1264">Anguilla (+1264)
                                                    </option>
                                                    <option data-countrycode="AG" value="1268">Antigua &amp; Barbuda
                                                        (+1268)
                                                    </option>
                                                    <option data-countrycode="AR" value="54">Argentina (+54)
                                                    </option>
                                                    <option data-countrycode="AM" value="374">Armenia (+374)
                                                    </option>
                                                    <option data-countrycode="AW" value="297">Aruba (+297)
                                                    </option>
                                                    <option data-countrycode="AU" value="61">Australia (+61)
                                                    </option>
                                                    <option data-countrycode="AT" value="43">Austria (+43)
                                                    </option>
                                                    <option data-countrycode="AZ" value="994">Azerbaijan (+994)
                                                    </option>
                                                    <option data-countrycode="BS" value="1242">Bahamas (+1242)
                                                    </option>
                                                    <option data-countrycode="BH" value="973">Bahrain (+973)
                                                    </option>
                                                    <option data-countrycode="BD" value="880">Bangladesh (+880)
                                                    </option>
                                                    <option data-countrycode="BB" value="1246">Barbados (+1246)
                                                    </option>
                                                    <option data-countrycode="BY" value="375">Belarus (+375)
                                                    </option>
                                                    <option data-countrycode="BE" value="32">Belgium (+32)
                                                    </option>
                                                    <option data-countrycode="BZ" value="501">Belize (+501)
                                                    </option>
                                                    <option data-countrycode="BJ" value="229">Benin (+229)
                                                    </option>
                                                    <option data-countrycode="BM" value="1441">Bermuda (+1441)
                                                    </option>
                                                    <option data-countrycode="BT" value="975">Bhutan (+975)
                                                    </option>
                                                    <option data-countrycode="BO" value="591">Bolivia (+591)
                                                    </option>
                                                    <option data-countrycode="BA" value="387">Bosnia Herzegovina (+387)
                                                    </option>
                                                    <option data-countrycode="BW" value="267">Botswana (+267)
                                                    </option>
                                                    <option data-countrycode="BR" value="55">Brazil (+55)
                                                    </option>
                                                    <option data-countrycode="BN" value="673">Brunei (+673)
                                                    </option>
                                                    <option data-countrycode="BG" value="359">Bulgaria (+359)
                                                    </option>
                                                    <option data-countrycode="BF" value="226">Burkina Faso (+226)
                                                    </option>
                                                    <option data-countrycode="BI" value="257">Burundi (+257)
                                                    </option>
                                                    <option data-countrycode="KH" value="855">Cambodia (+855)
                                                    </option>
                                                    <option data-countrycode="CM" value="237">Cameroon (+237)
                                                    </option>
                                                    <option data-countrycode="CA" value="1">Canada (+1)
                                                    </option>
                                                    <option data-countrycode="CV" value="238">Cape Verde Islands (+238)
                                                    </option>
                                                    <option data-countrycode="KY" value="1345">Cayman Islands (+1345)
                                                    </option>
                                                    <option data-countrycode="CF" value="236">Central African Republic
                                                        (+236)
                                                    </option>
                                                    <option data-countrycode="CL" value="56">Chile (+56)
                                                    </option>
                                                    <option data-countrycode="CN" value="86">China (+86)
                                                    </option>
                                                    <option data-countrycode="CO" value="57">Colombia (+57)
                                                    </option>
                                                    <option data-countrycode="KM" value="269">Comoros (+269)
                                                    </option>
                                                    <option data-countrycode="CG" value="242">Congo (+242)
                                                    </option>
                                                    <option data-countrycode="CK" value="682">Cook Islands (+682)
                                                    </option>
                                                    <option data-countrycode="CR" value="506">Costa Rica (+506)
                                                    </option>
                                                    <option data-countrycode="HR" value="385">Croatia (+385)
                                                    </option>
                                                    <!-- <option data-countryCode="CU" value="53">Cuba (+53)</option> -->
                                                    <option data-countrycode="CY" value="90">Cyprus - North (+90)
                                                    </option>
                                                    <option data-countrycode="CY" value="357">Cyprus - South (+357)
                                                    </option>
                                                    <option data-countrycode="CZ" value="420">Czech Republic (+420)
                                                    </option>
                                                    <option data-countrycode="DK" value="45">Denmark (+45)
                                                    </option>
                                                    <option data-countrycode="DJ" value="253">Djibouti (+253)
                                                    </option>
                                                    <option data-countrycode="DM" value="1809">Dominica (+1809)
                                                    </option>
                                                    <option data-countrycode="DO" value="1809">Dominican Republic
                                                        (+1809)
                                                    </option>
                                                    <option data-countrycode="EC" value="593">Ecuador (+593)
                                                    </option>
                                                    <option data-countrycode="EG" value="20">Egypt (+20)
                                                    </option>
                                                    <option data-countrycode="SV" value="503">El Salvador (+503)
                                                    </option>
                                                    <option data-countrycode="GQ" value="240">Equatorial Guinea (+240)
                                                    </option>
                                                    <option data-countrycode="ER" value="291">Eritrea (+291)
                                                    </option>
                                                    <option data-countrycode="EE" value="372">Estonia (+372)
                                                    </option>
                                                    <option data-countrycode="ET" value="251">Ethiopia (+251)
                                                    </option>
                                                    <option data-countrycode="FK" value="500">Falkland Islands (+500)
                                                    </option>
                                                    <option data-countrycode="FO" value="298">Faroe Islands (+298)
                                                    </option>
                                                    <option data-countrycode="FJ" value="679">Fiji (+679)
                                                    </option>
                                                    <option data-countrycode="FI" value="358">Finland (+358)
                                                    </option>
                                                    <option data-countrycode="FR" value="33">France (+33)
                                                    </option>
                                                    <option data-countrycode="GF" value="594">French Guiana (+594)
                                                    </option>
                                                    <option data-countrycode="PF" value="689">French Polynesia (+689)
                                                    </option>
                                                    <option data-countrycode="GA" value="241">Gabon (+241)
                                                    </option>
                                                    <option data-countrycode="GM" value="220">Gambia (+220)
                                                    </option>
                                                    <option data-countrycode="GE" value="7880">Georgia (+7880)
                                                    </option>
                                                    <option data-countrycode="DE" value="49">Germany (+49)
                                                    </option>
                                                    <option data-countrycode="GH" value="233">Ghana (+233)
                                                    </option>
                                                    <option data-countrycode="GI" value="350">Gibraltar (+350)
                                                    </option>
                                                    <option data-countrycode="GR" value="30">Greece (+30)
                                                    </option>
                                                    <option data-countrycode="GL" value="299">Greenland (+299)
                                                    </option>
                                                    <option data-countrycode="GD" value="1473">Grenada (+1473)
                                                    </option>
                                                    <option data-countrycode="GP" value="590">Guadeloupe (+590)
                                                    </option>
                                                    <option data-countrycode="GU" value="671">Guam (+671)
                                                    </option>
                                                    <option data-countrycode="GT" value="502">Guatemala (+502)
                                                    </option>
                                                    <option data-countrycode="GN" value="224">Guinea (+224)
                                                    </option>
                                                    <option data-countrycode="GW" value="245">Guinea - Bissau (+245)
                                                    </option>
                                                    <option data-countrycode="GY" value="592">Guyana (+592)
                                                    </option>
                                                    <option data-countrycode="HT" value="509">Haiti (+509)
                                                    </option>
                                                    <option data-countrycode="HN" value="504">Honduras (+504)
                                                    </option>
                                                    <option data-countrycode="HK" value="852">Hong Kong (+852)
                                                    </option>
                                                    <option data-countrycode="HU" value="36">Hungary (+36)
                                                    </option>
                                                    <option data-countrycode="IS" value="354">Iceland (+354)
                                                    </option>
                                                    <option data-countrycode="IN" value="91">India (+91)
                                                    </option>
                                                    <option data-countrycode="ID" value="62">Indonesia (+62)
                                                    </option>
                                                    <option data-countrycode="IQ" value="964">Iraq (+964)
                                                    </option>
                                                    <!-- <option data-countryCode="IR" value="98">Iran (+98)</option> -->
                                                    <option data-countrycode="IE" value="353">Ireland (+353)
                                                    </option>
                                                    <option data-countrycode="IL" value="972">Israel (+972)
                                                    </option>
                                                    <option data-countrycode="IT" value="39">Italy (+39)
                                                    </option>
                                                    <option data-countrycode="JM" value="1876">Jamaica (+1876)
                                                    </option>
                                                    <option data-countrycode="JP" value="81">Japan (+81)
                                                    </option>

                                                    <option data-countrycode="KZ" value="7">Kazakhstan (+7)
                                                    </option>
                                                    <option data-countrycode="KE" value="254">Kenya (+254)
                                                    </option>
                                                    <option data-countrycode="KI" value="686">Kiribati (+686)
                                                    </option>
                                                    <!-- <option data-countryCode="KP" value="850">Korea - North (+850)</option> -->
                                                    <option data-countrycode="KR" value="82">Korea - South (+82)
                                                    </option>
                                                    <option data-countrycode="KW" value="965">Kuwait (+965)
                                                    </option>
                                                    <option data-countrycode="KG" value="996">Kyrgyzstan (+996)
                                                    </option>
                                                    <option data-countrycode="LA" value="856">Laos (+856)
                                                    </option>
                                                    <option data-countrycode="LV" value="371">Latvia (+371)
                                                    </option>
                                                    <option data-countrycode="LB" value="961">Lebanon (+961)
                                                    </option>
                                                    <option data-countrycode="LS" value="266">Lesotho (+266)
                                                    </option>
                                                    <option data-countrycode="LR" value="231">Liberia (+231)
                                                    </option>
                                                    <option data-countrycode="LY" value="218">Libya (+218)
                                                    </option>
                                                    <option data-countrycode="LI" value="417">Liechtenstein (+417)
                                                    </option>
                                                    <option data-countrycode="LT" value="370">Lithuania (+370)
                                                    </option>
                                                    <option data-countrycode="LU" value="352">Luxembourg (+352)
                                                    </option>
                                                    <option data-countrycode="MO" value="853">Macao (+853)
                                                    </option>
                                                    <option data-countrycode="MK" value="389">Macedonia (+389)
                                                    </option>
                                                    <option data-countrycode="MG" value="261">Madagascar (+261)
                                                    </option>
                                                    <option data-countrycode="MW" value="265">Malawi (+265)
                                                    </option>
                                                    <option data-countrycode="MY" value="60">Malaysia (+60)
                                                    </option>
                                                    <option data-countrycode="MV" value="960">Maldives (+960)
                                                    </option>
                                                    <option data-countrycode="ML" value="223">Mali (+223)
                                                    </option>
                                                    <option data-countrycode="MT" value="356">Malta (+356)
                                                    </option>
                                                    <option data-countrycode="MH" value="692">Marshall Islands (+692)
                                                    </option>
                                                    <option data-countrycode="MQ" value="596">Martinique (+596)
                                                    </option>
                                                    <option data-countrycode="MR" value="222">Mauritania (+222)
                                                    </option>
                                                    <option data-countrycode="YT" value="269">Mayotte (+269)
                                                    </option>
                                                    <option data-countrycode="MX" value="52">Mexico (+52)
                                                    </option>
                                                    <option data-countrycode="FM" value="691">Micronesia (+691)
                                                    </option>
                                                    <option data-countrycode="MD" value="373">Moldova (+373)
                                                    </option>
                                                    <option data-countrycode="MC" value="377">Monaco (+377)
                                                    </option>
                                                    <option data-countrycode="MN" value="976">Mongolia (+976)
                                                    </option>
                                                    <option data-countrycode="MS" value="1664">Montserrat (+1664)
                                                    </option>
                                                    <option data-countrycode="MA" value="212">Morocco (+212)
                                                    </option>
                                                    <option data-countrycode="MZ" value="258">Mozambique (+258)
                                                    </option>
                                                    <option data-countrycode="MN" value="95">Myanmar (+95)
                                                    </option>
                                                    <option data-countrycode="NA" value="264">Namibia (+264)
                                                    </option>
                                                    <option data-countrycode="NR" value="674">Nauru (+674)
                                                    </option>
                                                    <option data-countrycode="NP" value="977">Nepal (+977)
                                                    </option>
                                                    <option data-countrycode="NL" value="31">Netherlands (+31)
                                                    </option>
                                                    <option data-countrycode="NC" value="687">New Caledonia (+687)
                                                    </option>
                                                    <option data-countrycode="NZ" value="64">New Zealand (+64)
                                                    </option>
                                                    <option data-countrycode="NI" value="505">Nicaragua (+505)
                                                    </option>
                                                    <option data-countrycode="NE" value="227">Niger (+227)
                                                    </option>
                                                    <option data-countrycode="NG" value="234">Nigeria (+234)
                                                    </option>
                                                    <option data-countrycode="NU" value="683">Niue (+683)
                                                    </option>
                                                    <option data-countrycode="NF" value="672">Norfolk Islands (+672)
                                                    </option>
                                                    <option data-countrycode="NP" value="670">Northern Marianas (+670)
                                                    </option>
                                                    <option data-countrycode="NO" value="47">Norway (+47)
                                                    </option>
                                                    <option data-countrycode="OM" value="968">Oman (+968)
                                                    </option>
                                                    <option data-countrycode="PK" value="92">Pakistan (+92)
                                                    </option>
                                                    <option data-countrycode="PW" value="680">Palau (+680)
                                                    </option>
                                                    <option data-countrycode="PA" value="507">Panama (+507)
                                                    </option>
                                                    <option data-countrycode="PG" value="675">Papua New Guinea (+675)
                                                    </option>
                                                    <option data-countrycode="PY" value="595">Paraguay (+595)
                                                    </option>
                                                    <option data-countrycode="PE" value="51">Peru (+51)
                                                    </option>
                                                    <option data-countrycode="PH" value="63">Philippines (+63)
                                                    </option>
                                                    <option data-countrycode="PL" value="48">Poland (+48)
                                                    </option>
                                                    <option data-countrycode="PT" value="351">Portugal (+351)
                                                    </option>
                                                    <option data-countrycode="PR" value="1787">Puerto Rico (+1787)
                                                    </option>
                                                    <option data-countrycode="QA" value="974">Qatar (+974)
                                                    </option>
                                                    <option data-countrycode="RE" value="262">Reunion (+262)
                                                    </option>
                                                    <option data-countrycode="RO" value="40">Romania (+40)
                                                    </option>
                                                    <option data-countrycode="RU" value="7">Russia (+7)
                                                    </option>
                                                    <option data-countrycode="RW" value="250">Rwanda (+250)
                                                    </option>
                                                    <option data-countrycode="SM" value="378">San Marino (+378)
                                                    </option>
                                                    <option data-countrycode="ST" value="239">Sao Tome &amp; Principe
                                                        (+239)
                                                    </option>
                                                    <option data-countrycode="SA" value="966">Saudi Arabia (+966)
                                                    </option>
                                                    <option data-countrycode="SN" value="221">Senegal (+221)
                                                    </option>
                                                    <option data-countrycode="CS" value="381">Serbia (+381)
                                                    </option>
                                                    <option data-countrycode="SC" value="248">Seychelles (+248)
                                                    </option>
                                                    <option data-countrycode="SL" value="232">Sierra Leone (+232)
                                                    </option>
                                                    <option data-countrycode="SG" value="65">Singapore (+65)
                                                    </option>
                                                    <option data-countrycode="SK" value="421">Slovak Republic (+421)
                                                    </option>
                                                    <option data-countrycode="SI" value="386">Slovenia (+386)
                                                    </option>
                                                    <option data-countrycode="SB" value="677">Solomon Islands (+677)
                                                    </option>
                                                    <option data-countrycode="SO" value="252">Somalia (+252)
                                                    </option>
                                                    <option data-countrycode="ZA" value="27">South Africa (+27)
                                                    </option>
                                                    <option data-countrycode="ES" value="34">Spain (+34)
                                                    </option>
                                                    <option data-countrycode="LK" value="94">Sri Lanka (+94)
                                                    </option>
                                                    <option data-countrycode="SH" value="290">St. Helena (+290)
                                                    </option>
                                                    <option data-countrycode="KN" value="1869">St. Kitts (+1869)
                                                    </option>
                                                    <option data-countrycode="SC" value="1758">St. Lucia (+1758)
                                                    </option>
                                                    <option data-countrycode="SR" value="597">Suriname (+597)
                                                    </option>
                                                    <option data-countrycode="SD" value="249">Sudan (+249)
                                                    </option>
                                                    <option data-countrycode="SZ" value="268">Swaziland (+268)
                                                    </option>
                                                    <option data-countrycode="SE" value="46">Sweden (+46)
                                                    </option>
                                                    <option data-countrycode="CH" value="41">Switzerland (+41)
                                                    </option>
                                                    <!-- <option data-countryCode="SY" value="963">Syria (+963)</option> -->
                                                    <option data-countrycode="TW" value="886">Taiwan (+886)
                                                    </option>
                                                    <option data-countrycode="TJ" value="992">Tajikistan (+992)
                                                    </option>
                                                    <option data-countrycode="TH" value="66">Thailand (+66)
                                                    </option>
                                                    <option data-countrycode="TG" value="228">Togo (+228)
                                                    </option>
                                                    <option data-countrycode="TO" value="676">Tonga (+676)
                                                    </option>
                                                    <option data-countrycode="TT" value="1868">Trinidad &amp; Tobago
                                                        (+1868)
                                                    </option>
                                                    <option data-countrycode="TN" value="216" tunisia="" (+216)=""
                                                    <="" option="">
                                                    </option>
                                                    <option data-countrycode="TR" value="90">Turkey (+90)
                                                    </option>
                                                    <option data-countrycode="TM" value="993">Turkmenistan (+993)
                                                    </option>
                                                    <option data-countrycode="TC" value="1649">Turks &amp; Caicos
                                                        Islands (+1649)
                                                    </option>
                                                    <option data-countrycode="TV" value="688">Tuvalu (+688)
                                                    </option>
                                                    <option data-countrycode="UG" value="256">Uganda (+256)
                                                    </option>
                                                    <option data-countrycode="UA" value="380">Ukraine (+380)
                                                    </option>
                                                    <option data-countrycode="US" value="1">USA (+1)
                                                    </option>
                                                    <option data-countrycode="GB" value="44">UK (+44)
                                                    </option>
                                                    <option data-countrycode="AE" value="971">United Arab Emirates
                                                        (+971)
                                                    </option>
                                                    <option data-countrycode="UY" value="598">Uruguay (+598)
                                                    </option>
                                                    <option data-countrycode="UZ" value="998">Uzbekistan (+998)
                                                    </option>
                                                    <option data-countrycode="VU" value="678">Vanuatu (+678)
                                                    </option>
                                                    <option data-countrycode="VA" value="379">Vatican City (+379)
                                                    </option>
                                                    <option data-countrycode="VE" value="58">Venezuela (+58)
                                                    </option>
                                                    <option data-countrycode="VN" value="84">Vietnam (+84)
                                                    </option>
                                                    <option data-countrycode="VG" value="1">Virgin Islands - British
                                                        (+1)
                                                    </option>
                                                    <option data-countrycode="VI" value="1">Virgin Islands - US (+1)
                                                    </option>
                                                    <option data-countrycode="WF" value="681">Wallis &amp; Futuna (+681)
                                                    </option>
                                                    <option data-countrycode="YE" value="969">Yemen (North)(+969)
                                                    </option>
                                                    <option data-countrycode="YE" value="967">Yemen (South)(+967)
                                                    </option>
                                                    <option data-countrycode="ZM" value="260">Zambia (+260)
                                                    </option>
                                                    <option data-countrycode="ZW" value="263">Zimbabwe (+263)
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 padding-left-right">
                                                <input v-validate="'required'" name="mobile" v-model="apply.mobile"
                                                       required="required" type="tel" class="form-control input-tel"
                                                       placeholder="Phone Number" maxlength="13" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group " style="margin-bottom: 10px !important;">
                                        <input v-validate="'required'" v-model="apply.referal_code" name="referal_code"
                                               class="form-control" tabindex="100"
                                               placeholder="Referral Code (optional)"
                                               type="text">

                                    </div>

                                    <div class="form-group " style="margin-bottom: 10px !important;">
                                        <input v-validate="'required|min:6|max:45'" v-model="apply.password" name="Password"
                                               class="form-control" tabindex="100"
                                               required min="6"
                                               placeholder="Password"
                                               type="password">
                                        <span class="text-danger mt-1" v-if="errors.has('Password')">{{ errors.first("Password")}}</span>
                                    </div>
                                    <div class="form-group " style="margin-bottom: 10px !important;">
                                        <input v-validate="{ required : true,  confirmed:apply.password}" v-model="password_confirm" name="Password Confirmation"
                                               required min="6"
                                               class="form-control" tabindex="100"
                                               placeholder="Password Confirmation"
                                               type="password">
                                        <span class="text-danger mt-1" v-if="errors.has('Password Confirmation')">{{ errors.first("Password Confirmation")}}</span>

                                    </div>
                                    <label class="requirements">Requirements</label>
                                    <div class="form-group row" style="padding-bottom: 30px;">
                                        <div class="col-md-7">
                                            <label style="font-weight: 500;">Android Mobile</label>
                                            <input v-model="apply.android_mobile" name="android_mobile" class="col-md-4"
                                                   type="checkbox">
                                        </div>
                                        <div class="col-md-5">
                                            <label style="font-weight: 500;">Car</label>
                                            <input v-model="apply.car" name="car" type="checkbox">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button @click="continueButton" class="btn btn-default shopper-continue">
                                            Continue
                                            <i class="glyph-icon flaticon-arrows"></i>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <p class="legal"> We will use this information to communicate with you about
                                            your
                                            application. </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="shopper_tables_sec" id="scrolls">
            <div class="container">
                <div class="container_hidde" style="display:none;">
                    <div class="title">Positions at Basket</div>
                    <div class="sub-title">Shop, check-out, deliver or do it all - there's a role for you at Basket.
                    </div>
                    <div class="col-md-6">
                        <div class="problem_table">
                            <div class="section-title">No Car? No Problem</div>
                            <div class="row">
                                <div class="col-md-6 positions-role">
                                    <div class="role-title shopper-title">Shopper</div>
                                    <div class="role-text">part-time employee</div>
                                    <div class="role-desc">Shop for grocery orders in local stores.</div>
                                    <hr>
                                    <div class="role-list">
                                        <ul>
                                            <li>Shopping only</li>
                                            <li>No vehicle required</li>
                                            <li>Flexible schedule</li>
                                            <li>Work up to 29 hrs/wk</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 positions-role">
                                    <div class="role-title cashier-title">Cashier</div>
                                    <div class="role-text">part-time employee</div>
                                    <div class="role-desc">Work the cash register to check out orders</div>
                                    <hr>
                                    <div class="role-list">
                                        <ul>
                                            <li>Check-out only</li>
                                            <li>No vehicle required</li>
                                            <li>Flexible schedule</li>
                                            <li>Work up to 29 hrs/wk</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="problem_table">
                            <div class="section-title">Car Required</div>
                            <div class="row">
                                <div class="col-md-6 positions-role">
                                    <div class="role-title shopper-title">Driver</div>
                                    <div class="role-text">independent contractor</div>
                                    <div class="role-desc">Deliver groceries from local stores to customers.</div>
                                    <hr>
                                    <div class="role-list">
                                        <ul>
                                            <li>Delivery only</li>
                                            <li>Vehicle required</li>
                                            <li>Flexible schedule</li>
                                            <li>Work unlimited hours</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 positions-role">
                                    <div class="role-title cashier-title">Driver + Shopper</div>
                                    <div class="role-text">independent contractor</div>
                                    <div class="role-desc">Shop for groceries and deliver them to customers</div>
                                    <hr>
                                    <div class="role-list">
                                        <ul>
                                            <li>Delivery and shopping</li>
                                            <li>Vehicle required</li>
                                            <li>Flexible schedule</li>
                                            <li>Work unlimited hours</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="happy-images">
                <div class="inner">
                    <div class="happy-image">
                        <img alt="" height="398px" width="100%" class="img-responsive-box" src="images/website1.png">
                        <h4>Be a Household Hero</h4>
                        <p>From families to seniors, make someone's day, every day</p>
                    </div>
                    <div class="happy-image">
                        <img alt="" height="398px" width="100%" class="img-responsive-box" src="images/website2.png">
                        <h4>Flexibility to Meet Your Needs</h4>
                        <p>Earn with Basket while balancing work and life</p>
                    </div>
                    <div class="happy-image">
                        <img alt="Join a meaningful community" height="398px" width="100%" class="img-responsive-box"
                             src="images/website3.png">
                        <h4>Choose Your Personal Path</h4>
                        <p>Be your own boss or develop a career path as an employee, it's up to you</p>
                    </div>
                </div>
            </div>
            <div class="happy-divider">
                <div class="inner-drver">
                    <h1>
                        Basket connects customers with shoppers<br>
                        to deliver fresh groceries to their door.
                    </h1>
                </div>
            </div>
            <div class="apply-section">
                <div class="desc">
                    Apply in under 5 minutes! Attend an in-person
                    <br> session and start work within one week!
                </div>
                <div id="btn-to-signup-form" class="btn-apply-now ">
                    <a class="btn btn-default sign_up_btn" data-event="open_signup_form_from_positions"
                       @click="applyNow">
                        Apply Now <i class="glyph-icon flaticon-arrows"></i>
                    </a>
                </div>
            </div>
        </section>

        <div class="navi_footer">
            <div class="container-fluid">
                <ul class="footer_naviv">
                    <li class="naviv-item-list-item">
                        <router-link :to="{ name: 'login'}" class="naviv-item-list-item-link">
                            Basket.jo
                        </router-link>
                    </li>
                    <li class="naviv-item-list-item">
                        <router-link :to="{ name: 'terms.conditions'}" class="naviv-item-list-item-link">
                            Terms Conditions
                        </router-link>
                    </li>
                    <li class="naviv-item-list-item">
                        <router-link :to="{ name: 'about.us'}" class="naviv-item-list-item-link">
                            About Us
                        </router-link>
                    </li>

                    <li class="naviv-item-list-item">
                        <router-link :to="{ name: 'privacy.policy'}" class="naviv-item-list-item-link">
                            Privacy policy
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Apply",
        data() {
            return {
                applyErrors: false,
                password_confirm:'',
                apply: {
                    first_name: "",
                    last_name: "",
                    email: "",
                    country_code: "962",
                    mobile: "",
                    password: "",
                    gender: "Male",
                    shopper_type: 1,
                    car :'',
                    android_mobile:"",
                    referal_code: "",
                }
            };
        },

        methods: {
            applyNow() {
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            },

            alreadyHaveAnAccount() {
                window.scrollTo({
                    top: 1000,
                    left: 0,
                    behavior: 'smooth'
                });
            },

            continueButton() {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(apiDev + '/shopper-registration', this.apply).then(response => {
                            this.$bvToast.toast(response.data.response.Message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            });


                            if (response.data.response.httpCode == 200) {
                                this.apply.first_name = '';
                                this.apply.last_name = '';
                                this.apply.email = '';
                                this.apply.mobile = '';
                                this.apply.android_mobile = '';
                                this.apply.car = '';
                                this.apply.referal_code = '';
                                this.$router.push({name: 'apply.thank.you'});
                            }
                        }).catch(error => {

                        })
                    }
                });
            }
        },

        created() {

        },

        mounted() {

        }
    }
</script>

<style scoped>
    header {
        display: none;
    }

    .inner-test {
        padding-left: 20px !important;
    }

    .input-tel {
        padding-left: 5px;
        padding-right: 0px;
        font-size: 15px;
    }

    .country_drop {
        padding-right: 5px;
    }

    .happy-images {
        background: white;
        padding-bottom: 64px;
    }

    .inner {
        margin-left: auto;
        margin-right: auto;
        padding-top: 64px;
        padding-left: 50px;
        padding-right: 50px;
    }

    .happy-image {
        display: inline-block;
        width: calc(33% - 33px);
        margin-left: 15px;
        margin-right: 15px;
        vertical-align: top;
        text-align: center;
    }

    .happy-divider {
        background: white;
        padding: 64px 0;
        text-align: center;
        width: 100%;
    }

    .inner-drver {
        display: inline-block;
        margin: 0 auto;
        text-align: center;
        width: 72%;
    }

    .header-div {
        padding-top: 10px;
        padding-left: 2%;
        padding-right: 6px;
    }

    .bounce-footer > .inner {
        padding-top: 44px;
    }

    .money_shopping_popu {
        width: 480px;
    }

    .shopper-continue {
        height: 60px !important;
    }

    .order_summary_shopper_comm {
        overflow: hidden;
        overflow-y: hidden;
        height: min-content !important;
        min-height: 580px !important;
        padding: 0px !important;
    }

    .order_summary_shopper {
        padding-top: 20px;
    }

    input:focus {
        border-color: #ecb76b !important;
        -webkit-box-shadow: 0 0 7px #ecb76b !important;
        box-shadow: 0 0 10px #ecb76b !important;
    }

    .sign_up_btn {
        background-color: var(--theme-color) !important;
        border-color: var(--theme-color) !important;
    }

    .btn-apply-now {

    }

    #p_popup {
        top: 10% !important;
    }

    .right_nav_shop .btn-primary {
        background: none !important;
        border: 1px solid #fff !important;
    }

    .from_shop_right .form-control {
        height: 48px;
    }

    #shoppers_check > .form-group {
        margin-bottom: 8px;
    }

    .shopper-continue:hover {
        background-color: #338720 !important;
        border-color: #338720 !important;
    }

    .from_shop_right {
        display: inline-block;
        padding: 0 35px;
        width: 380px !important;
    }

    .money_shopping_popu {
        width: 381px;
    }

    .title {
        font-size: 36px !important;
        margin-top: 24px !important;
        font-weight: 700 !important;
    }

    @media only screen and (max-width: 991px) {
        .img-responsive-box {
            height: 300px !important;
        }

        .order_summary_shopper_comm {
            height: 576px !important;
        }

        .frame {
            min-height: 790px !important;
        }

        .navigation {
            text-align: center;
            margin: auto;

        }

        .navigation {
            float: none;
            margin: auto;
        }

        .right_nav_shop {
            float: none;
            margin: auto;
            margin-top: 11px;

        }

    }

    @media only screen and (max-width: 769px) {
        .img-responsive-box {
            height: 300px !important;
        }

        .order_summary_shopper_comm {
            height: 576px !important;
        }

        .navigation {
            text-align: center;
            margin: auto;

        }

        .navigation {
            float: none;
            margin: auto;
        }

        .right_nav_shop {
            float: none;
            margin: auto;
            margin-top: 11px;

        }
    }

    @media only screen and (max-width: 690px) {
        .happy-image {
            width: calc(100% - 33px);
        }

        .darkener {
            min-height: 920px !important;
        }

        .background {
            min-height: 920px !important;
        }

        .frame {
            min-height: 828px !important;
        }

        #p_popup {
            top: 13% !important;
        }

        .order_summary_shopper_comm {
            height: 658px !important;
        }

        .order_summary_shopper_comm {
            width: 332px;
            margin-left: 0px;
        }

        .from_shop_right {
            width: 355px !important;
            padding-left: 11px;
            padding-right: 34px;
        }

        .title {
            font-size: 30px !important;
            margin-top: 17px !important;
        }

        .inner-test {
            padding-left: 0px !important;
        }

        .bounce-footer {
            width: 345px !important;
        }

    }

    .alert-danger {
        background-color: white !important;;
        border-color: white !important;
    }

    .alert {
        border: 0px solid transparent;
        border-radius: 0px;
        text-align: center;
        padding-bottom: 3px;
        margin-bottom: 0px;
    }

    .float-right-login {
        float: right;
    }


    @media (max-width: 375px) {
        .float-right-login {
            float: none;
        }
    }

    .padding-right-left {
        padding-right: 3px;
        padding-left: 0px;
    }

    .padding-left-right {
        padding-right: 0px;
        padding-left: 3px;
    }

    .requirements {
        font-weight: 700;
        font-size: 14px;
    }


</style>
