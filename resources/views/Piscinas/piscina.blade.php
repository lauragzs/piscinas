@extends('layouts.app')
@section('css')
<style>
  .tabset > input[type="radio"] {
    position: absolute;
    left: -200vw;
  }
  .tabset .tab-panel {
    display: none;
  }
  .tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
  .tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
  .tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
  .tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
  .tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
  .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
    display: block;
  }
  body {
    color: #333;
    font-weight: 300;
  }
  .tabset > label {
    font: 16px/1.5em "Overpass", "Open Sans", Helvetica, sans-serif;
    position: relative;
    display: inline-block;
    padding: 15px 15px 25px;
    border: 1px solid transparent;
    border-bottom: 0;
    cursor: pointer;
    font-weight: 600;
  }
  .tabset > label::after {
    content: "";
    position: absolute;
    left: 15px;
    bottom: 10px;
    width: 22px;
    height: 4px;
    background: #8d8d8d;
  }
  input:focus-visible + label {
    outline: 2px solid rgba(0,102,204,1);
    border-radius: 3px;
  }
  .tabset > label:hover,
  .tabset > input:focus + label,
  .tabset > input:checked + label {
    color: #06c;
  }
  .tabset > label:hover::after,
  .tabset > input:focus + label::after,
  .tabset > input:checked + label::after {
    background: #06c;
  }
  .tabset > input:checked + label {
    border-color: #8d8d8d;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
  }
  .tab-panel {
    padding: 30px;
    border-top: 1px solid #ccc;
  }
  *,
  *:before,
  *:after {
    box-sizing: border-box;
  }
</style>
@endsection
@section('name')
  <a href="{{route('dashboard')}}">>>> Piscinas</a>
@endsection
@section('content')
<!-- Row start -->
<div class="row">
  <div class="col-xxl-12">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="card-title">Listado de piscinas registradas</h5>
      </div>
      <div class="card-body">
        <a data-bs-toggle="modal" data-bs-target="#ModalAñadir" class="btn btn-info" role="button">Añadir <i class="fa-regular fa-square-plus"></i></a>
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Cliente</th>
                <th>Pais</th>
                <th>Telefono</th>
                <th>Tipo</th>
                <th>Profundidad(m)</th>
                <th>Longitud(m)</th>
                <th>Largo(m)</th>
                <th>Ancho(m)</th>
                <th>Area(m²)</th>
                <th>Perimetro(m)</th>
                <th>Volumen(m³)</th>
              </tr>
            </thead>
            <tbody>
              @foreach($piscinas as $piscinas)
                <tr>
                  <td>
                    <div class="d-flex flex-row align-items-center">
                      <p class="m-0">{{ $piscinas->nombrep }}</p>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex flex-row align-items-center">
                      <p class="m-0">{{ $piscinas->cliente }}</p>
                    </div>
                  </td>
                  <td>
                    <p class="m-0">{{ $piscinas->pais }}</p>
                  </td>
                  <td>{{ $piscinas->telefono }}</td>
                  <td>
                    <span class="badge bg-primary">{{ $piscinas->tipo }}</span>
                  </td>
                  <td>
                    <p class="m-0">{{ $piscinas->profundidad }}</p>
                  </td>
                  <td>
                    {{ $piscinas->longitud }}
                    <!--<div class="rate2 rating-stars"></div> -->
                  </td>
                  <td>
                    {{ $piscinas->largo }}
                    <!--<div id="sparkline1"></div>-->
                  </td>
                  <td>
                    {{ $piscinas->ancho }}
                  </td>
                  <td>
                    {{ $piscinas->area }}
                  </td>
                  <td>
                    {{ $piscinas->perimetro }}
                  </td>
                  <td>
                    <p class="m-0 text-danger"></p>
                    {{ $piscinas->volumen }}
                    
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Row end -->
<!-- Modal para Añadir Piscina -->
  <div class="modal fade" id="ModalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
        <form action="{{ route('piscina.store') }}" method="POST">
          @csrf
          <div class="tabset">
            <!-- Tab 1 -->
            <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
            <label for="tab1">Paso 1</label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
            <label for="tab2">Paso 2</label>
            <!-- Tab 3 -->
            <input type="radio" name="tabset" id="tab3" aria-controls="dunkles">
            <label for="tab3">Paso 3</label>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="tab-panels">
                <section id="marzen" class="tab-panel">
                <h2>Datos del Proyecto</h2>
                  <div class="mb-3">
                    <label for="nombrep" class="form-label">Nombre del Proyecto</label>
                    <input type="text" class="form-control" id="nombrep" name="nombrep" required>
                  </div>
                  <div class="mb-3">
                    <label for="cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control" id="cliente" name="cliente" value="{{ Auth::user()->name }}" readonly>
                    </div>
                  <div class="mb-3">
                    <label for="pais" class="form-label">Pais</label>
                    <select name="pais" class="form-select">
                      <option value="AF">Afganistán</option><option value="AL">Albania</option><option value="DE">Alemania</option>
                      <option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option>
                      <option value="AQ">Antártida</option><option value="AG">Antigua y Barbuda</option><option value="AN">Antillas Holandesas</option>
                      <option value="SA">Arabia Saudí</option><option value="DZ">Argelia</option><option value="AR">Argentina</option>
                      <option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option>
                      <option value="AT">Austria</option><option value="AZ">Azerbaiyán</option><option value="BS">Bahamas</option>
                      <option value="BH">Bahrein</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option>
                      <option value="BE">Bélgica</option><option value="BZ">Belice</option><option value="BJ">Benin</option>
                      <option value="BM">Bermudas</option><option value="BY">Bielorrusia</option><option value="MM">Birmania</option>
                      <option value="BO">Bolivia</option><option value="BA">Bosnia y Herzegovina</option><option value="BW">Botswana</option>
                      <option value="BR">Brasil</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option>
                      <option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="BT">Bután</option>
                      <option value="CV">Cabo Verde</option><option value="KH">Camboya</option><option value="CM">Camerún</option>
                      <option value="CA">Canadá</option><option value="TD">Chad</option><option value="CL">Chile</option>
                      <option value="CN">China</option><option value="CY">Chipre</option><option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                      <option value="CO">Colombia</option><option value="KM">Comores</option><option value="CG">Congo</option>
                      <option value="CD">Congo, República Democrática del</option><option value="KR">Corea</option><option value="KP">Corea del Norte</option>
                      <option value="CI">Costa de Marfíl</option><option value="CR">Costa Rica</option><option value="HR">Croacia (Hrvatska)</option>
                      <option value="CU">Cuba</option><option value="DK">Dinamarca</option><option value="DJ">Djibouti</option>
                      <option value="DM">Dominica</option><option value="EC">Ecuador</option><option value="EG">Egipto</option>
                      <option value="SV">El Salvador</option><option value="AE">Emiratos Árabes Unidos</option><option value="ER">Eritrea</option>
                      <option value="SI">Eslovenia</option><option value="ES" selected>España</option><option value="US">Estados Unidos</option>
                      <option value="EE">Estonia</option><option value="ET">Etiopía</option><option value="FJ">Fiji</option>
                      <option value="PH">Filipinas</option><option value="FI">Finlandia</option><option value="FR">Francia</option>
                      <option value="GA">Gabón</option><option value="GM">Gambia</option><option value="GE">Georgia</option>
                      <option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GD">Granada</option>
                      <option value="GR">Grecia</option><option value="GL">Groenlandia</option><option value="GP">Guadalupe</option>
                      <option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GY">Guayana</option>
                      <option value="GF">Guayana Francesa</option><option value="GN">Guinea</option><option value="GQ">Guinea Ecuatorial</option>
                      <option value="GW">Guinea-Bissau</option><option value="HT">Haití</option><option value="HN">Honduras</option>
                      <option value="HU">Hungría</option><option value="IN">India</option><option value="ID">Indonesia</option>
                      <option value="IQ">Irak</option><option value="IR">Irán</option><option value="IE">Irlanda</option>
                      <option value="BV">Isla Bouvet</option><option value="CX">Isla de Christmas</option><option value="IS">Islandia</option>
                      <option value="KY">Islas Caimán</option><option value="CK">Islas Cook</option><option value="CC">Islas de Cocos o Keeling</option>
                      <option value="FO">Islas Faroe</option><option value="HM">Islas Heard y McDonald</option><option value="FK">Islas Malvinas</option>
                      <option value="MP">Islas Marianas del Norte</option><option value="MH">Islas Marshall</option><option value="UM">Islas menores de Estados Unidos</option>
                      <option value="PW">Islas Palau</option><option value="SB">Islas Salomón</option><option value="SJ">Islas Svalbard y Jan Mayen</option>
                      <option value="TK">Islas Tokelau</option><option value="TC">Islas Turks y Caicos</option><option value="VI">Islas Vírgenes (EEUU)</option>
                      <option value="VG">Islas Vírgenes (Reino Unido)</option><option value="WF">Islas Wallis y Futuna</option><option value="IL">Israel</option>
                      <option value="IT">Italia</option><option value="JM">Jamaica</option><option value="JP">Japón</option>
                      <option value="JO">Jordania</option><option value="KZ">Kazajistán</option><option value="KE">Kenia</option>
                      <option value="KG">Kirguizistán</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option>
                      <option value="LA">Laos</option><option value="LS">Lesotho</option><option value="LV">Letonia</option>
                      <option value="LB">Líbano</option><option value="LR">Liberia</option><option value="LY">Libia</option>
                      <option value="LI">Liechtenstein</option><option value="LT">Lituania</option><option value="LU">Luxemburgo</option>
                      <option value="MK">Macedonia, Ex-República Yugoslava de</option><option value="MG">Madagascar</option><option value="MY">Malasia</option>
                      <option value="MW">Malawi</option><option value="MV">Maldivas</option><option value="ML">Malí</option>
                      <option value="MT">Malta</option><option value="MA">Marruecos</option><option value="MQ">Martinica</option>
                      <option value="MU">Mauricio</option><option value="MR">Mauritania</option><option value="YT">Mayotte</option>
                      <option value="MX">México</option><option value="FM">Micronesia</option><option value="MD">Moldavia</option>
                      <option value="MC">Mónaco</option><option value="MN">Mongolia</option><option value="MS">Montserrat</option>
                      <option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NR">Nauru</option>
                      <option value="NP">Nepal</option><option value="NI">Nicaragua</option><option value="NE">Níger</option>
                      <option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk</option>
                      <option value="NO">Noruega</option><option value="NC">Nueva Caledonia</option><option value="NZ">Nueva Zelanda</option>
                      <option value="OM">Omán</option><option value="NL">Países Bajos</option><option value="PA">Panamá</option>
                      <option value="PG">Papúa Nueva Guinea</option><option value="PK">Paquistán</option><option value="PY">Paraguay</option>
                      <option value="PE">Perú</option><option value="PN">Pitcairn</option><option value="PF">Polinesia Francesa</option>
                      <option value="PL">Polonia</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option>
                      <option value="QA">Qatar</option><option value="UK">Reino Unido</option><option value="CF">República Centroafricana</option>
                      <option value="CZ">República Checa</option><option value="ZA">República de Sudáfrica</option><option value="DO">República Dominicana</option>
                      <option value="SK">República Eslovaca</option><option value="RE">Reunión</option><option value="RW">Ruanda</option>
                      <option value="RO">Rumania</option><option value="RU">Rusia</option><option value="EH">Sahara Occidental</option>
                      <option value="KN">Saint Kitts y Nevis</option><option value="WS">Samoa</option><option value="AS">Samoa Americana</option>
                      <option value="SM">San Marino</option><option value="VC">San Vicente y Granadinas</option><option value="SH">Santa Helena</option>
                      <option value="LC">Santa Lucía</option><option value="ST">Santo Tomé y Príncipe</option><option value="SN">Senegal</option>
                      <option value="SC">Seychelles</option><option value="SL">Sierra Leona</option><option value="SG">Singapur</option>
                      <option value="SY">Siria</option><option value="SO">Somalia</option><option value="LK">Sri Lanka</option>
                      <option value="PM">St Pierre y Miquelon</option><option value="SZ">Suazilandia</option><option value="SD">Sudán</option>
                      <option value="SE">Suecia</option><option value="CH">Suiza</option><option value="SR">Surinam</option>
                      <option value="TH">Tailandia</option><option value="TW">Taiwán</option><option value="TZ">Tanzania</option>
                      <option value="TJ">Tayikistán</option><option value="TF">Territorios franceses del Sur</option><option value="TP">Timor Oriental</option>
                      <option value="TG">Togo</option><option value="TO">Tonga</option><option value="TT">Trinidad y Tobago</option>
                      <option value="TN">Túnez</option><option value="TM">Turkmenistán</option><option value="TR">Turquía</option>
                      <option value="TV">Tuvalu</option><option value="UA">Ucrania</option><option value="UG">Uganda</option>
                      <option value="UY">Uruguay</option><option value="UZ">Uzbekistán</option><option value="VU">Vanuatu</option>
                      <option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="YE">Yemen</option>
                      <option value="YU">Yugoslavia</option><option value="ZM">Zambia</option><option value="ZW">Zimbabue</option>
                    </select>
                  </div>
                  <div class="mb-3 row">
                    <label for="phoneNumber" class="form-label">Telefono</label>
                    <div class="col-4 col-md-4">
                    <select class="form-select" id="countryCode" name="countryCode">
                      <option value="+93">Afghanistan +93</option>
                      <option value="+358">Aland Islands +358</option>
                      <option value="+355">Albania +355</option>
                      <option value="+213">Algeria +213</option>
                      <option value="+1684">American Samoa +1684</option>
                      <option value="+376">Andorra +376</option>
                      <option value="+244">Angola +244</option>
                      <option value="+1264">Anguilla +1264</option>
                      <option value="+672">Antarctica +672</option>
                      <option value="+1268">Antigua and Barbuda +1268</option>
                      <option value="+54">Argentina +54</option>
                      <option value="+374">Armenia +374</option>
                      <option value="+297">Aruba +297</option>
                      <option value="+61">Australia +61</option>
                      <option value="+43">Austria +43</option>
                      <option value="+994">Azerbaijan +994</option>
                      <option value="+1242">Bahamas +1242</option>
                      <option value="+973">Bahrain +973</option>
                      <option value="+880">Bangladesh +880</option>
                      <option value="+1246">Barbados +1246</option>
                      <option value="+375">Belarus +375</option>
                      <option value="+32">Belgium +32</option>
                      <option value="+501">Belize +501</option>
                      <option value="+229">Benin +229</option>
                      <option value="+1441">Bermuda +1441</option>
                      <option value="+975">Bhutan +975</option>
                      <option value="+591">Bolivia +591</option>
                      <option value="+599">Bonaire, Sint Eustatius and Saba +599</option>
                      <option value="+387">Bosnia and Herzegovina +387</option>
                      <option value="+267">Botswana +267</option>
                      <option value="+55">Bouvet Island +55</option>
                      <option value="+55">Brazil +55</option>
                      <option value="+246">British Indian Ocean Territory +246</option>
                      <option value="+673">Brunei Darussalam +673</option>
                      <option value="+359">Bulgaria +359</option>
                      <option value="+226">Burkina Faso +226</option>
                      <option value="+257">Burundi +257</option>
                      <option value="+855">Cambodia +855</option>
                      <option value="+237">Cameroon +237</option>
                      <option value="+1">Canada +1</option>
                      <option value="+238">Cape Verde +238</option>
                      <option value="+1345">Cayman Islands +1345</option>
                      <option value="+236">Central African Republic +236</option>
                      <option value="+235">Chad +235</option>
                      <option value="+56">Chile +56</option>
                      <option value="+86">China +86</option>
                      <option value="+61">Christmas Island +61</option>
                      <option value="+672">Cocos (Keeling) Islands +672</option>
                      <option value="+57">Colombia +57</option>
                      <option value="+269">Comoros +269</option>
                      <option value="+242">Congo +242</option>
                      <option value="+242">Congo, Democratic Republic of the Congo +242</option>
                      <option value="+682">Cook Islands +682</option>
                      <option value="+506">Costa Rica +506</option>
                      <option value="+225">Cote D'Ivoire +225</option>
                      <option value="+385">Croatia +385</option>
                      <option value="+53">Cuba +53</option>
                      <option value="+599">Curacao +599</option>
                      <option value="+357">Cyprus +357</option>
                      <option value="+420">Czech Republic +420</option>
                      <option value="+45">Denmark +45</option>
                      <option value="+253">Djibouti +253</option>
                      <option value="+1767">Dominica +1767</option>
                      <option value="+1809">Dominican Republic +1809</option>
                      <option value="+593">Ecuador +593</option>
                      <option value="+20">Egypt +20</option>
                      <option value="+503">El Salvador +503</option>
                      <option value="+240">Equatorial Guinea +240</option>
                      <option value="+291">Eritrea +291</option>
                      <option value="+372">Estonia +372</option>
                      <option value="+251">Ethiopia +251</option>
                      <option value="+500">Falkland Islands (Malvinas) +500</option>
                      <option value="+298">Faroe Islands +298</option>
                      <option value="+679">Fiji +679</option>
                      <option value="+358">Finland +358</option>
                      <option value="+33">France +33</option>
                      <option value="+594">French Guiana +594</option>
                      <option value="+689">French Polynesia +689</option>
                      <option value="+262">French Southern Territories +262</option>
                      <option value="+241">Gabon +241</option>
                      <option value="+220">Gambia +220</option>
                      <option value="+995">Georgia +995</option>
                      <option value="+49">Germany +49</option>
                      <option value="+233">Ghana +233</option>
                      <option value="+350">Gibraltar +350</option>
                      <option value="+30">Greece +30</option>
                      <option value="+299">Greenland +299</option>
                      <option value="+1473">Grenada +1473</option>
                      <option value="+590">Guadeloupe +590</option>
                      <option value="+1671">Guam +1671</option>
                      <option value="+502">Guatemala +502</option>
                      <option value="+44">Guernsey +44</option>
                      <option value="+224">Guinea +224</option>
                      <option value="+245">Guinea-Bissau +245</option>
                      <option value="+592">Guyana +592</option>
                      <option value="+509">Haiti +509</option>
                      <option value="+39">Holy See (Vatican City State) +39</option>
                      <option value="+504">Honduras +504</option>
                      <option value="+852">Hong Kong +852</option>
                      <option value="+36">Hungary +36</option>
                      <option value="+354">Iceland +354</option>
                      <option value="+91">India +91</option>
                      <option value="+62">Indonesia +62</option>
                      <option value="+98">Iran, Islamic Republic of +98</option>
                      <option value="+964">Iraq +964</option>
                      <option value="+353">Ireland +353</option>
                      <option value="+44">Isle of Man +44</option>
                      <option value="+972">Israel +972</option>
                      <option value="+39">Italy +39</option>
                      <option value="+1876">Jamaica +1876</option>
                      <option value="+81">Japan +81</option>
                      <option value="+44">Jersey +44</option>
                      <option value="+962">Jordan +962</option>
                      <option value="+7">Kazakhstan +7</option>
                      <option value="+254">Kenya +254</option>
                      <option value="+686">Kiribati +686</option>
                      <option value="+850">Korea, Democratic People's Republic of +850</option>
                      <option value="+82">Korea, Republic of +82</option>
                      <option value="+381">Kosovo +383</option>
                      <option value="+965">Kuwait +965</option>
                      <option value="+996">Kyrgyzstan +996</option>
                      <option value="+856">Lao People's Democratic Republic +856</option>
                      <option value="+371">Latvia +371</option>
                      <option value="+961">Lebanon +961</option>
                      <option value="+266">Lesotho +266</option>
                      <option value="+231">Liberia +231</option>
                      <option value="+218">Libyan Arab Jamahiriya +218</option>
                      <option value="+423">Liechtenstein +423</option>
                      <option value="+370">Lithuania +370</option>
                      <option value="+352">Luxembourg +352</option>
                      <option value="+853">Macao +853</option>
                      <option value="+389">Macedonia, the Former Yugoslav Republic of +389</option>
                      <option value="+261">Madagascar +261</option>
                      <option value="+265">Malawi +265</option>
                      <option value="+60">Malaysia +60</option>
                      <option value="+960">Maldives +960</option>
                      <option value="+223">Mali +223</option>
                      <option value="+356">Malta +356</option>
                      <option value="+692">Marshall Islands +692</option>
                      <option value="+596">Martinique +596</option>
                      <option value="+222">Mauritania +222</option>
                      <option value="+230">Mauritius +230</option>
                      <option value="+262">Mayotte +262</option>
                      <option value="+52">Mexico +52</option>
                      <option value="+691">Micronesia, Federated States of +691</option>
                      <option value="+373">Moldova, Republic of +373</option>
                      <option value="+377">Monaco +377</option>
                      <option value="+976">Mongolia +976</option>
                      <option value="+382">Montenegro +382</option>
                      <option value="+1664">Montserrat +1664</option>
                      <option value="+212">Morocco +212</option>
                      <option value="+258">Mozambique +258</option>
                      <option value="+95">Myanmar +95</option>
                      <option value="+264">Namibia +264</option>
                      <option value="+674">Nauru +674</option>
                      <option value="+977">Nepal +977</option>
                      <option value="+31">Netherlands +31</option>
                      <option value="+599">Netherlands Antilles +599</option>
                      <option value="+687">New Caledonia +687</option>
                      <option value="+64">New Zealand +64</option>
                      <option value="+505">Nicaragua +505</option>
                      <option value="+227">Niger +227</option>
                      <option value="+234">Nigeria +234</option>
                      <option value="+683">Niue +683</option>
                      <option value="+67">Norfolk Island +672</option>
                      <option value="+1670">Northern Mariana Islands +1670</option>
                      <option value="+47">Norway +47</option>
                      <option value="+968">Oman +968</option>
                      <option value="+92">Pakistan +92</option>
                      <option value="+680">Palau +680</option>
                      <option value="+970">Palestinian Territory, Occupied +970</option>
                      <option value="+507">Panama +507</option>
                      <option value="+675">Papua New Guinea +675</option>
                      <option value="+595">Paraguay +595</option>
                      <option value="+51">Peru +51</option>
                      <option value="+63">Philippines +63</option>
                      <option value="+64">Pitcairn +64</option>
                      <option value="+48">Poland +48</option>
                      <option value="+351">Portugal +351</option>
                      <option value="+1787">Puerto Rico +1787</option>
                      <option value="+974">Qatar +974</option>
                      <option value="+262">Reunion +262</option>
                      <option value="+40">Romania +40</option>
                      <option value="+7">Russian Federation +7</option>
                      <option value="+250">Rwanda +250</option>
                      <option value="+590">Saint Barthelemy +590</option>
                      <option value="+290">Saint Helena +290</option>
                      <option value="+1869">Saint Kitts and Nevis +1869</option>
                      <option value="+1758">Saint Lucia +1758</option>
                      <option value="+590">Saint Martin +590</option>
                      <option value="+508">Saint Pierre and Miquelon +508</option>
                      <option value="+1784">Saint Vincent and the Grenadines +1784</option>
                      <option value="+684">Samoa +684</option>
                      <option value="+378">San Marino +378</option>
                      <option value="+239">Sao Tome and Principe +239</option>
                      <option value="+966">Saudi Arabia +966</option>
                      <option value="+221">Senegal +221</option>
                      <option value="+381">Serbia +381</option>
                      <option value="+381">Serbia and Montenegro +381</option>
                      <option value="+248">Seychelles +248</option>
                      <option value="+232">Sierra Leone +232</option>
                      <option value="+65">Singapore +65</option>
                      <option value="+721">Sint Maarten +721</option>
                      <option value="+421">Slovakia +421</option>
                      <option value="+386">Slovenia +386</option>
                      <option value="+677">Solomon Islands +677</option>
                      <option value="+252">Somalia +252</option>
                      <option value="+27">South Africa +27</option>
                      <option value="+500">South Georgia and the South Sandwich Islands +500</option>
                      <option value="+211">South Sudan +211</option>
                      <option value="+34">Spain +34</option>
                      <option value="+94">Sri Lanka +94</option>
                      <option value="+249">Sudan +249</option>
                      <option value="+597">Suriname +597</option>
                      <option value="+47">Svalbard and Jan Mayen +47</option>
                      <option value="+268">Swaziland +268</option>
                      <option value="+46">Sweden +46</option>
                      <option value="+41">Switzerland +41</option>
                      <option value="+963">Syrian Arab Republic +963</option>
                      <option value="+886">Taiwan, Province of China +886</option>
                      <option value="+992">Tajikistan +992</option>
                      <option value="+255">Tanzania, United Republic of +255</option>
                      <option value="+66">Thailand +66</option>
                      <option value="+670">Timor-Leste +670</option>
                      <option value="+228">Togo +228</option>
                      <option value="+690">Tokelau +690</option>
                      <option value="+676">Tonga +676</option>
                      <option value="+1868">Trinidad and Tobago +1868</option>
                      <option value="+216">Tunisia +216</option>
                      <option value="+90">Turkey +90</option>
                      <option value="+7370">Turkmenistan +7370</option>
                      <option value="+1649">Turks and Caicos Islands +1649</option>
                      <option value="+688">Tuvalu +688</option>
                      <option value="+256">Uganda +256</option>
                      <option value="+380">Ukraine +380</option>
                      <option value="+971">United Arab Emirates +971</option>
                      <option value="+44">United Kingdom +44</option>
                      <option value="+1">United States +1</option>
                      <option value="+1">United States Minor Outlying Islands +1</option>
                      <option value="+598">Uruguay +598</option>
                      <option value="+998">Uzbekistan +998</option>
                      <option value="+678">Vanuatu +678</option>
                      <option value="+58">Venezuela +58</option>
                      <option value="+84">Viet Nam +84</option>
                      <option value="+1284">Virgin Islands, British +1284</option>
                      <option value="+1340">Virgin Islands, U.s. +1340</option>
                      <option value="+681">Wallis and Futuna +681</option>
                      <option value="+212">Western Sahara +212</option>
                      <option value="+967">Yemen +967</option>
                      <option value="+260">Zambia +260</option>
                      <option value="+263">Zimbabwe +263</option>
                  </select>
                    </div>
                    <div class="col-8 col-md-8">
                      <input type="number" step="0" min="0" class="form-control" id="phoneNumber" name="phoneNumber" required>
                    </div>
                  </div>
                  <button type="button" aria-controls="rauchbier" class="btn btn-info" id="btnContinuar">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="rauchbier" class="tab-panel">
                  <h2>Tipo de Piscina</h2>
                  <div class="row mb-3">
                    <div class="col-12 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="regular" value="regular" checked>
                        <label class="form-check-label" for="regular">Regular</label>
                      </div>
                      <img src="https://3dwarehouse.sketchup.com/warehouse/v1.0/content/public/1fd3d2bd-be01-4477-bbe4-55bf8f2dcd21" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="irregular" value="irregular">
                        <label class="form-check-label" for="irregular">Irregular</label>
                      </div>
                      <img src="https://3dwarehouse.sketchup.com/warehouse/v1.0/content/public/70adfffb-55e0-42c3-966e-89369c781b24" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div id="regular-fields" class="row mb-3">
                    <div class="col-md-4">
                      <label for="profundidad" class="form-label">Profundidad (m)</label>
                      <input type="number" class="form-control" id="profundidad" name="profundidad" step="0" min="0" placeholder="0">
                    </div>
                    <div class="col-md-4">
                      <label for="largo" class="form-label">Largo (m)</label>
                      <input type="number" class="form-control" id="largo" name="largo" step="0" min="0" placeholder="0">
                    </div>
                    <div class="col-md-4">
                      <label for="ancho" class="form-label">Ancho (m)</label>
                      <input type="number" class="form-control" id="ancho" name="ancho" step="0" min="0" placeholder="0">
                    </div>
                  </div>
                  <div id="irregular-fields" class="row mb-3">
                    <div class="col-md-6">
                      <label for="profundidad" class="form-label">Profundidad (m)</label>
                      <input type="number" class="form-control" id="profundidad-irregular" name="profundidad" step="0" min="0" placeholder="0" disabled>
                    </div>
                    <div class="col-md-6">
                      <label for="longitud" class="form-label">Longitud (m)</label>
                      <input type="number" class="form-control" id="longitud" name="longitud" step="0" min="0" placeholder="0" disabled>
                    </div>
                  </div>
                  <button type="button" aria-controls="dunkles" class="btn btn-info" id="btnContinuar2">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="dunkles" class="tab-panel">
                  <h2>Paso 3</h2>
                  <div class="mb-3">
                    <label for="area" class="form-label">Area (m²)</label>
                    <input type="number" class="form-control" id="area" name="area" step="0.01" min="0" placeholder="0,00" required>
                  </div>
                  <div class="mb-3">
                    <label for="perimetro" class="form-label">Perimetro (m)</label>
                    <input type="number" class="form-control" id="perimetro" name="perimetro" step="0.01" min="0" placeholder="0,00" required>
                  </div>                              
                  <div class="mb-3">
                    <label for="volumen" class="form-label">Volumen (m³)</label>
                    <input type="number" class="form-control" id="volumen" name="volumen" step="0.001" min="0" placeholder="0,00" required>
                  </div>
                  <input type="hidden" id="telefono" name="telefono">
                  <button type="submit" class="btn btn-info" onclick="combinePhoneNumber()">Añadir <i class="fa-solid fa-plus"></i></button>
                </section>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script>
  function combinePhoneNumber() {
    // Capturar los valores del código del país y del número de teléfono
    var countryCode = document.getElementById('countryCode').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    // Concatenar ambos valores en el formato deseado
    var fullPhoneNumber = countryCode + ' ' + phoneNumber;
    // Asignar el valor combinado al campo 'telefono'
    document.getElementById('telefono').value = fullPhoneNumber;
    // Opcional: Imprimir el resultado en consola para verificar
    //console.log('Número combinado:', fullPhoneNumber);
  }
  document.getElementById('btnContinuar').addEventListener('click', () => {
    document.getElementById('tab2').checked = true;
  });
  document.getElementById('btnContinuar2').addEventListener('click', () => {
    document.getElementById('tab3').checked = true;
  });
  // Obtener los elementos
  const regularRadio = document.getElementById('regular');
  const irregularRadio = document.getElementById('irregular');
  const regularFields = document.getElementById('regular-fields');
  const irregularFields = document.getElementById('irregular-fields');
  const profundidadRegular = document.getElementById('profundidad');
  const largoRegular = document.getElementById('largo');
  const anchoRegular = document.getElementById('ancho');
  const profundidadIrregular = document.getElementById('profundidad-irregular');
  const longitudIrregular = document.getElementById('longitud');
  // Función para mostrar/ocultar campos según la selección
  function toggleFields() {
    if (regularRadio.checked) {
      regularFields.style.display = 'flex';  // Mostrar campos para piscina regular
      irregularFields.style.display = 'none';  // Ocultar campos para piscina irregular
      // Habilitar campos de Regular
      profundidadRegular.disabled = false;
      largoRegular.disabled = false;
      anchoRegular.disabled = false;
      // Deshabilitar campos de Irregular
      profundidadIrregular.disabled = true;
      longitudIrregular.disabled = true;
    } else if (irregularRadio.checked) {
      regularFields.style.display = 'none';  // Ocultar campos para piscina regular
      irregularFields.style.display = 'flex';  // Mostrar campos para piscina irregular
      // Habilitar campos de Irregular
      profundidadIrregular.disabled = false;
      longitudIrregular.disabled = false;
      // Deshabilitar campos de Regular
      profundidadRegular.disabled = true;
      largoRegular.disabled = true;
      anchoRegular.disabled = true;
    }
  }
  // Escuchar los cambios en los radios
  regularRadio.addEventListener('change', toggleFields);
  irregularRadio.addEventListener('change', toggleFields);
  // Inicializar el estado de los campos según la selección por defecto
  toggleFields();
</script>
@endsection
                      <!--<div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Piscina</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="message" class="alert alert-success" style="display: none;">Se añadió correctamente</div>
                            <form action="{{ route('piscina.store') }}" method="POST" onsubmit="showLoader(); showMessage();">
                                @csrf
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Cliente</label>
                                    <input type="text" class="form-control" id="cliente" name="cliente" required>
                                </div>
                                <div class="mb-3">
                                    <label for="pais" class="form-label">Pais</label>
                                    <input type="text" class="form-control" id="pais" name="pais" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tipo</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="regular" value="Regular" checked>
                                        <label class="form-check-label" for="regular">Regular</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="irregular" value="Irregular">
                                        <label class="form-check-label" for="irregular">Irregular</label>
                                    </div>                                
                                </div>
                                <div class="mb-3">
                                    <label for="profundidad" class="form-label">Profundidad</label>
                                    <input type="number" class="form-control" id="profundidad" name="profundidad" required>
                                </div>
                                <div class="mb-3">
                                    <label for="largo" class="form-label">Largo</label>
                                    <input type="number" class="form-control" id="largo" name="largo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ancho" class="form-label">Ancho</label>
                                    <input type="number" class="form-control" id="ancho" name="ancho" required>
                                </div>
                                <div class="mb-3">
                                    <label for="longitud" class="form-label">Longitud</label>
                                    <input type="number" class="form-control" id="longitud" name="longitud" required>
                                </div>
                                <button type="submit" class="btn btn-info">Añadir <i class="fa-solid fa-plus"></i></button>
                            </form>
                        </div>
                    </div>-->