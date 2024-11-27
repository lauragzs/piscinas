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
  .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6),
  .tabset > input:nth-child(13):checked ~ .tab-panels > .tab-panel:nth-child(7),
  .tabset > input:nth-child(15):checked ~ .tab-panels > .tab-panel:nth-child(8){
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
  .help-icon {
    position: absolute;
    top: 20px;
    right: 25px;
    width: 30px;
    height: 30px;
    background-color: #007bff;
    color: white;
    font-size: 18px;
    font-weight: bold;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  }
  .help-tooltip {
    display: none;
    position: absolute;
    top: 60px;
    right: 20px;
    background-color: white;
    color: #333;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    width: auto;
    z-index: 10;
  }
  .help-tooltip img {
    display: block;
  }
  .help-tooltip h4 {
    margin: 0 0 10px;
  }
  .indicator {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
  }
  .circle {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    display: inline-block;
  }
  .green {
    background-color: green;
  }
  .red {
    background-color: red;
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
                <th>País</th>
                <th>Teléfono</th>
                <th>Tipo</th>
                <th>Profundidad(m)</th>
                <th>Área(m²)</th>
                <th>Perímetro(m)</th>
                <th>Volumen(m³)</th>
                <th>Caudal de <br>Circulación</th>
                <th>Diametro de <br>Succión</th>
                <th>Diametro de <br>Impulsión</th>
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
                    {{ $piscinas->area }}
                  </td>
                  <td>
                    {{ $piscinas->perimetro }}
                  </td>
                  <td>
                    <p class="m-0 text-danger"></p>
                    {{ $piscinas->volumen }}
                  </td>
                  <td>
                    {{ $piscinas->caudal }}
                    <!--<div class="rate2 rating-stars"></div> -->
                  </td>
                  <td>
                    {{ $piscinas->succion }}
                    <!--<div id="sparkline1"></div>-->
                  </td>
                  <td>
                    {{ $piscinas->impulsion }}
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
            <!-- Tab 4 -->
            <input type="radio" name="tabset" id="tab4" aria-controls="paso4">
            <label for="tab4">Paso 4</label>
            <!-- Tab 5 -->
            <input type="radio" name="tabset" id="tab5" aria-controls="paso5">
            <label for="tab5">Paso 5</label>
            <!-- Tab 6 -->
            <input type="radio" name="tabset" id="tab6" aria-controls="paso6">
            <label for="tab6">Paso 6</label>
            <!-- Tab 7 -->
            <input type="radio" name="tabset" id="tab7" aria-controls="paso7">
            <label for="tab7">Paso 7</label>
            <!-- Tab 8 -->
            <input type="radio" name="tabset" id="tab8" aria-controls="paso8">
            <label for="tab8">Paso 8</label>

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
                    <label for="pais" class="form-label">País</label>
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
                      <option value="BO" selected>Bolivia</option><option value="BA">Bosnia y Herzegovina</option><option value="BW">Botswana</option>
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
                      <option value="SI">Eslovenia</option><option value="ES">España</option><option value="US">Estados Unidos</option>
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
                    <label for="phoneNumber" class="form-label">Teléfono</label>
                    <div class="col-4 col-md-4">
                    <select class="form-select" id="countryCode" name="countryCode">
                      <option value="+93">Afganistán +93</option>
                      <option value="+355">Albania +355</option><option value="+49">Alemania +49</option><option value="+376">Andorra +376</option>
                      <option value="+244">Angola +244</option><option value="+1264">Anguilla +1264</option><option value="+672">Antártida +672</option>
                      <option value="+1268">Antigua y Barbuda +1268</option><option value="+599">Antillas Holandesas +599</option><option value="+966">Arabia Saudí +966</option>
                      <option value="+213">Argelia +213</option><option value="+54">Argentina +54</option><option value="+374">Armenia +374</option>
                      <option value="+297">Aruba +297</option><option value="+61">Australia +61</option><option value="+43">Austria +43</option>
                      <option value="+994">Azerbaiyán +994</option><option value="+1242">Bahamas +1242</option><option value="+973">Bahrein +973</option>
                      <option value="+880">Bangladesh +880</option><option value="+1246">Barbados +1246</option><option value="+32">Bélgica +32</option>
                      <option value="+501">Belice +501</option><option value="+229">Benin +229</option><option value="+1441">Bermudas +1441</option>
                      <option value="+375">Bielorrusia +375</option><option value="+95">Birmania +95</option><option selected value="+591">Bolivia +591</option>
                      <option value="+387">Bosnia y Herzegovina +387</option><option value="+267">Botswana +267</option><option value="+55">Brasil +55</option>
                      <option value="+673">Brunei +673</option><option value="+359">Bulgaria +359</option><option value="+226">Burkina Faso +226</option>
                      <option value="+257">Burundi +257</option><option value="+975">Bután +975</option><option value="+238">Cabo Verde +238</option>
                      <option value="+855">Camboya +855</option><option value="+237">Camerún +237</option><option value="+1">Canadá +1</option>
                      <option value="+235">Chad +235</option><option value="+56">Chile +56</option><option value="+86">China +86</option>
                      <option value="+357">Chipre +357</option><option value="+39">Ciudad del Vaticano (Santa Sede) +39</option><option value="+57">Colombia +57</option>
                      <option value="+269">Comores +269</option><option value="+242">Congo +242</option><option value="+243">Congo, República Democrática del +243</option>
                      <option value="+82">Corea +82</option><option value="+850">Corea del Norte +850</option><option value="+225">Costa de Marfíl +225</option>
                      <option value="+506">Costa Rica +506</option><option value="+385">Croacia (Hrvatska) +385</option><option value="+53">Cuba +53</option>
                      <option value="+45">Dinamarca +45</option><option value="+253">Djibouti +253</option><option value="+1767">Dominica +1767</option>
                      <option value="+593">Ecuador +593</option><option value="+20">Egipto +20</option><option value="+503">El Salvador +503</option>
                      <option value="+971">Emiratos Árabes Unidos +971</option><option value="+291">Eritrea +291</option><option value="+386">Eslovenia +386</option>
                      <option value="+34">España +34</option><option value="+1">Estados Unidos +1</option><option value="+593">Ecuador +593</option>
                      <option value="+20">Egipto +20</option><option value="+503">El Salvador +503</option><option value="+971">Emiratos Árabes Unidos +971</option>
                      <option value="+291">Eritrea +291</option><option value="+386">Eslovenia +386</option><option value="+34" selected>España +34</option>
                      <option value="+1">Estados Unidos +1</option><option value="+372">Estonia +372</option><option value="+251">Etiopía +251</option>
                      <option value="+679">Fiji +679</option><option value="+63">Filipinas +63</option><option value="+358">Finlandia +358</option>
                      <option value="+33">Francia +33</option><option value="+241">Gabón +241</option><option value="+220">Gambia +220</option>
                      <option value="+995">Georgia +995</option><option value="+233">Ghana +233</option><option value="+350">Gibraltar +350</option>
                      <option value="+1473">Granada +1473</option><option value="+30">Grecia +30</option><option value="+299">Groenlandia +299</option>
                      <option value="+590">Guadalupe +590</option><option value="+1671">Guam +1671</option><option value="+502">Guatemala +502</option>
                      <option value="+592">Guayana +592</option><option value="+594">Guayana Francesa +594</option><option value="+224">Guinea +224</option>
                      <option value="+240">Guinea Ecuatorial +240</option><option value="+245">Guinea-Bissau +245</option><option value="+509">Haití +509</option>
                      <option value="+504">Honduras +504</option><option value="+36">Hungría +36</option><option value="+91">India +91</option>
                      <option value="+62">Indonesia +62</option><option value="+964">Irak +964</option><option value="+98">Irán +98</option>
                      <option value="+353">Irlanda +353</option><option value="+354">Islandia +354</option><option value="+972">Israel +972</option>
                      <option value="+39">Italia +39</option><option value="+1876">Jamaica +1876</option><option value="+81">Japón +81</option>
                      <option value="+962">Jordania +962</option><option value="+7">Kazajistán +7</option><option value="+254">Kenia +254</option>
                      <option value="+996">Kirguizistán +996</option><option value="+686">Kiribati +686</option><option value="+965">Kuwait +965</option>
                      <option value="+856">Laos +856</option><option value="+266">Lesotho +266</option><option value="+371">Letonia +371</option>
                      <option value="+961">Líbano +961</option><option value="+231">Liberia +231</option><option value="+218">Libia +218</option>
                      <option value="+423">Liechtenstein +423</option><option value="+370">Lituania +370</option><option value="+352">Luxemburgo +352</option>
                      <option value="+389">Macedonia +389</option><option value="+261">Madagascar +261</option><option value="+60">Malasia +60</option>
                      <option value="+265">Malawi +265</option><option value="+960">Maldivas +960</option><option value="+223">Malí +223</option>
                      <option value="+356">Malta +356</option><option value="+212">Marruecos +212</option><option value="+596">Martinica +596</option>
                      <option value="+230">Mauricio +230</option><option value="+222">Mauritania +222</option><option value="+262">Mayotte +262</option>
                      <option value="+52">México +52</option><option value="+691">Micronesia +691</option><option value="+373">Moldavia +373</option>
                      <option value="+377">Mónaco +377</option><option value="+976">Mongolia +976</option><option value="+1664">Montserrat +1664</option>
                      <option value="+258">Mozambique +258</option><option value="+264">Namibia +264</option><option value="+674">Nauru +674</option>
                      <option value="+977">Nepal +977</option><option value="+505">Nicaragua +505</option><option value="+227">Níger +227</option>
                      <option value="+234">Nigeria +234</option><option value="+683">Niue +683</option><option value="+672">Norfolk +672</option>
                      <option value="+47">Noruega +47</option><option value="+687">Nueva Caledonia +687</option><option value="+64">Nueva Zelanda +64</option>
                      <option value="+968">Omán +968</option><option value="+31">Países Bajos +31</option><option value="+92">Pakistán +92</option>
                      <option value="+680">Palaos +680</option><option value="+507">Panamá +507</option><option value="+675">Papúa Nueva Guinea +675</option>
                      <option value="+595">Paraguay +595</option><option value="+51">Perú +51</option><option value="+689">Polinesia Francesa +689</option>
                      <option value="+48">Polonia +48</option><option value="+351">Portugal +351</option><option value="+1787">Puerto Rico +1787</option>
                      <option value="+974">Qatar +974</option><option value="+44">Reino Unido +44</option><option value="+236">República Centroafricana +236</option>
                      <option value="+420">República Checa +420</option><option value="+243">República Democrática del Congo +243</option><option value="+1809">República Dominicana +1809</option>
                      <option value="+262">Reunión +262</option><option value="+250">Ruanda +250</option><option value="+40">Rumanía +40</option>
                      <option value="+7">Rusia +7</option><option value="+685">Samoa +685</option><option value="+684">Samoa Americana +684</option>
                      <option value="+378">San Marino +378</option><option value="+239">Santo Tomé y Príncipe +239</option><option value="+221">Senegal +221</option>
                      <option value="+381">Serbia +381</option><option value="+248">Seychelles +248</option><option value="+232">Sierra Leona +232</option>
                      <option value="+65">Singapur +65</option><option value="+963">Siria +963</option><option value="+252">Somalia +252</option>
                      <option value="+94">Sri Lanka +94</option><option value="+268">Suazilandia +268</option><option value="+27">Sudáfrica +27</option>
                      <option value="+249">Sudán +249</option><option value="+211">Sudán del Sur +211</option><option value="+46">Suecia +46</option>
                      <option value="+41">Suiza +41</option><option value="+597">Surinam +597</option><option value="+66">Tailandia +66</option>
                      <option value="+886">Taiwán +886</option><option value="+992">Tayikistán +992</option><option value="+255">Tanzania +255</option>
                      <option value="+670">Timor Oriental +670</option><option value="+228">Togo +228</option><option value="+676">Tonga +676</option>
                      <option value="+1868">Trinidad y Tobago +1868</option><option value="+216">Túnez +216</option><option value="+993">Turkmenistán +993</option>
                      <option value="+90">Turquía +90</option><option value="+688">Tuvalu +688</option><option value="+380">Ucrania +380</option>
                      <option value="+256">Uganda +256</option><option value="+598">Uruguay +598</option><option value="+998">Uzbekistán +998</option>
                      <option value="+678">Vanuatu +678</option><option value="+58">Venezuela +58</option><option value="+84">Vietnam +84</option>
                      <option value="+681">Wallis y Futuna +681</option><option value="+967">Yemen +967</option><option value="+260">Zambia +260</option>
                      <option value="+263">Zimbabue +263</option>
                  </select>
                    </div>
                    <div class="col-8 col-md-8">
                      <input type="number" step="0" min="0" class="form-control" id="phoneNumber" name="phoneNumber" required>
                    </div>
                  </div>
                  <button type="button" onclick="combinePhoneNumber()" aria-controls="rauchbier" class="btn btn-info" id="btnContinuar">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="rauchbier" class="tab-panel">
                  <h2>Tipo de Piscina</h2>
                  <div class="row mb-3">
                    <div class="col-6 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="regular" value="regular" checked>
                        <label class="form-check-label" for="regular">Regular</label>
                      </div>
                      <img src="https://3dwarehouse.sketchup.com/warehouse/v1.0/content/public/1fd3d2bd-be01-4477-bbe4-55bf8f2dcd21" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-6">
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
                  <button type="button" aria-controls="marzen" class="btn btn-info" id="btnVolver">Volver <i class="fa-solid fa-plus"></i></button>
                  <button onclick="paso3()" type="button" aria-controls="dunkles" class="btn btn-info" id="btnContinuar2">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="dunkles" class="tab-panel">
                  <h2>Paso 3</h2>
                  <div class="mb-3">
                    <label for="area" class="form-label">Área (m²)</label>
                    <input type="number" class="form-control" id="area" name="area" step="0.01" min="0" placeholder="0,00" required>
                  </div>
                  <div class="mb-3">
                    <label for="perimetro" class="form-label">Perímetro (m)</label>
                    <input type="number" class="form-control" id="perimetro" name="perimetro" step="0.01" min="0" placeholder="0,00" required>
                  </div>                              
                  <div class="mb-3">
                    <label for="volumen" class="form-label">Volumen (m³)</label>
                    <input type="number" class="form-control" id="volumen" name="volumen" step="0.001" min="0" placeholder="0,00" required>
                  </div>
                  <input type="hidden" id="telefono" name="telefono">
                  <input type="hidden" id="caudalms" name="caudal">
                  <button type="button" aria-controls="rauchbier" class="btn btn-info" id="btnVolver2">Volver <i class="fa-solid fa-plus"></i></button>
                  <button onclick="radiotiempo()" type="button" aria-controls="paso4" class="btn btn-info" id="btnContinuar3">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="paso4" class="tab-panel" style="position: relative;">
                  <h2>Tiempo Máximo de Filtración</h2>
                  <div class="help-icon" onclick="toggleHelpTooltip('tooltip1')">?</div>
                  <div id="tooltip1" class="help-tooltip">
                    <h4>Tiempo Máximo de Filtración (horas)</h4>
                    <img src="{{ asset('assets/images/tipologia.png') }}" alt="velocidades" style="width: 420px">
                  </div>
                  <div class="mb-3 row">
                    <h5>Tipología</h5>
                    <div class="col-6 col-md-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipologia" id="privada" value="privada" checked>
                          <label class="form-check-label" for="privada">Privada</label>
                        </div>
                      </div>
                      <div class="col-6 col-md-6">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipologia" id="publica" value="publica">
                          <label class="form-check-label" for="publica">Pública</label>
                        </div>
                      </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-12 col-md-6">
                      <label for="prof" class="form-label">Profundidad (m)</label>
                      <input type="text" class="form-control" id="prof" name="prof" readonly>
                    </div>
                    <div class="col-12 col-md-6">
                      <label for="tiempo" class="form-label">Tiempo (h)</label>
                      <input type="text" class="form-control" id="tiempo" name="tiempo" readonly>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="caudal" class="form-label">Caudal de Recirculación</label>
                    <div class="col-6 col-md-3">
                      <input type="text" class="form-control" id="caudalm" placeholder="0,00" readonly>
                    </div>
                    <div class="col-6 col-md-3">
                      <input type="text" class="form-control" id="caudall" name="caudal" placeholder="0,00" readonly>
                    </div>
                    <div class="col-12 col-md-6">
                      <input type="button" value="Calcular" onclick="caudalrec()" class="form-control btn btn-info" id="calcaudal" name="calcaudal">
                    </div>
                  </div>
                  <button type="button" aria-controls="dunkles" class="btn btn-info" id="btnVolver3">Volver <i class="fa-solid fa-plus"></i></button>
                  <button type="button" onclick="paso5()" aria-controls="paso5" class="btn btn-info" id="btnContinuar4">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="paso5" class="tab-panel" style="position: relative;">
                  <h2>Diametro de Succión e Impulsión</h2>
                  <div class="help-icon" onclick="toggleHelpTooltip('tooltip2')">?</div>
                  <div id="tooltip2" class="help-tooltip">
                    <h4>Velocidades Máximas</h4>
                    <img style="width: 250px" src="{{ asset('assets/images/succionimpulsion.png') }}" alt="velocidades">
                  </div>
                  <div class="mb-3 row">
                    <h5>Diámetros mínimos recomendados</h5>
                    <div class="col-12 col-md-6">
                      <label for="succion" class="form-label">Succión</label>
                      <input type="text" class="form-control" id="succion" readonly>
                    </div>
                    <div class="col-12 col-md-6">
                      <label for="impulsion" class="form-label">Impulsión</label>
                      <input type="text" class="form-control" id="impulsion"  readonly>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <h5>Asumir diámetros</h5>
                    <div class="col-12 col-md-6">
                      <label for="succion" class="form-label">Succión</label>
                      <div class="row">
                        <div class="col-5 col-md-5">
                          <select id="succions" name="succion" class="form-select" onchange="validateRange()">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="60">60</option>
                          </select>
                        </div>
                        <div id="feedback" class="indicator col-7 col-md-7"></div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <label for="impulsion" class="form-label">Impulsión</label>
                      <div class="row">
                        <div class="col-5 col-md-5">
                          <select id="impulsions" name="impulsion" class="form-select" onchange="validateRangeImp()">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="60">60</option>
                          </select>
                        </div>
                        <div id="feedback2" class="indicator col-7 col-md-7"></div>
                      </div>
                    </div>
                  </div>
                  <button type="button" aria-controls="paso4" class="btn btn-info" id="btnVolver4">Volver <i class="fa-solid fa-plus"></i></button>
                  <button type="button" onclick="paso6()" aria-controls="paso6" class="btn btn-info" id="btnContinuar5">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="paso6" class="tab-panel">
                  <h2>Número de Retornos, Skimmer y Dren de fondo</h2>
                  <div class="row mb-3">
                    <label for="retorno" class="form-label">Retorno</label>
                    <div class="col-5 col-md-4">
                      <img style="height: 120px " src="{{ asset('assets/images/retorno.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 col-md-8">
                        <label for="retornom" class="form-label">Nº de Retornos mínimo</label>
                        <input type="number" readonly class="form-control" id="retornom" step="0" min="0" placeholder="0" required>
                        <label for="retorno" class="form-label">Asumir Nº de Retornos</label>
                        <input type="number" class="form-control" id="retorno" name="retorno" step="0" min="0" placeholder="0" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="retorno" class="form-label">Skimmer</label>
                    <div class="col-5 col-md-4">
                      <img style="height: 120px " src="{{ asset('assets/images/skimmer.jpg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 col-md-8">
                        <label for="skimmerm" class="form-label">Nº de Skimmer mínimo</label>
                        <input type="number" readonly class="form-control" id="skimmerm" step="0" min="0" placeholder="0" required>
                        <label for="skimmer" class="form-label">Asumir Nº de Skimmer</label>
                        <input type="number" class="form-control" id="skimmer" name="skimmer" step="0" min="0" placeholder="0" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="retorno" class="form-label">Dren de Fondo</label>
                    <div class="col-5 col-md-4">
                      <img style="height: 120px " src="{{ asset('assets/images/drenfondo.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 col-md-8">
                        <label for="drenm" class="form-label">Nº de Dren mínimo</label>
                        <input type="number" readonly class="form-control" id="drenm" step="0" min="0" placeholder="0" required>
                        <label for="dren" class="form-label">Asumir Nº de Dren</label>
                        <input type="number" class="form-control" id="dren" name="dren" step="0" min="0" placeholder="0" required>
                    </div>
                  </div>
                  <button type="button" aria-controls="paso5" class="btn btn-info" id="btnVolver5">Volver <i class="fa-solid fa-plus"></i></button>
                  <button type="button" onclick="paso7()" aria-controls="paso7" class="btn btn-info" id="btnContinuar6">Continuar <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="paso7" class="tab-panel" style="position: relative;">
                  <h2>Filtro de Arena</h2>
                  <div class="help-icon" onclick="toggleHelpTooltip('tooltip3')">?</div>
                  <div id="tooltip3" class="help-tooltip">
                    <h4>Tabla de Selección de Filtros</h4>
                    <img style="width: 730px" src="{{ asset('assets/images/filtrosres.png') }}" alt="velocidades">
                  </div>
                  <div class="row mt-3 mb-3">
                    <div class="col-6 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="forma" id="forma1" value="forma1" checked>
                        <label class="form-check-label" for="forma1">Primera Forma</label>
                      </div>
                    </div>
                    <div class="col-6 col-md-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="forma" id="forma2" value="forma2">
                        <label class="form-check-label" for="forma2">Segunda Forma</label>
                      </div>
                    </div>
                  </div>
                  <div id="forma1-fields" class="row mt-3 mb-3">
                    <h5>1º Forma</h5>
                    <p>Adoptar el área de filtrado del fabricante y verificar la velocidad de filtrado</p>
                    <div class="col-md-4 col-6">
                      <label for="areaf" class="form-label">Área de Filtrado (m²)</label>
                      <input type="number" class="form-control" id="areaf" step="0.000" min="0.000" placeholder="0.000">
                    </div>
                    <div class="col-md-4 col-6">
                      <label for="velocidadf" class="form-label">Velocidad de Filtrado (m/h)</label>
                      <input type="number" readonly class="form-control" id="velocidadf" step="0" min="0" placeholder="0">
                    </div>
                    <div class="col-md-4 col-6">
                      <label for="filtro" class="form-label">Modelo</label>
                      <input type="text" class="form-control" id="filtro" name="filtro">
                    </div>
                  </div>
                  <div id="forma2-fields" class="row mb-3">
                    <h5>2º Forma</h5>
                    <p>Adoptar la velocidad de filtrado de acuerdo al reglamento y determinar el diámetro del filtro</p>
                    <div class="col-md-4 col-6">
                      <label for="velocidadf2" class="form-label">Velocidad de Filtrado (m/h)</label>
                      <input type="number" class="form-control" id="velocidadf2" step="0" min="0" placeholder="0">
                    </div>
                    <div class="col-md-4 col-6">
                      <label for="diametrof" class="form-label">Diámetro del Filtro (mm)</label>
                      <input type="number" readonly class="form-control" id="diametrof" step="0.00" min="0.00" placeholder="0.00">
                    </div>
                    <div class="col-md-4 col-6">
                      <label for="filtro2" class="form-label">Modelo</label>
                      <input type="text" class="form-control" id="filtro2" name="filtro">
                    </div>
                  </div>
                  <button type="button" aria-controls="paso6" class="btn btn-info" id="btnVolver6">Volver <i class="fa-solid fa-plus"></i></button>
                  <button type="button" aria-controls="paso7" class="btn btn-info" id="btnContinuar7">Continuar <i class="fa-solid fa-plus"></i></button>
                  <button type="submit" class="btn btn-info">Añadir <i class="fa-solid fa-plus"></i></button>
                </section>
                <section id="paso8" class="tab-panel">
                  <h2>Pérdidas de cargas en tuberías y accesorios</h2>
                  <div class="row mb-3">
                  </div>
                  <button type="button" aria-controls="paso7" class="btn btn-info" id="btnVolver7">Volver <i class="fa-solid fa-plus"></i></button>
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
  //CONTINUAR
  document.getElementById('btnContinuar').addEventListener('click', () => {
    document.getElementById('tab2').checked = true;
  });
  document.getElementById('btnContinuar2').addEventListener('click', () => {
    document.getElementById('tab3').checked = true;
  });
  document.getElementById('btnContinuar3').addEventListener('click', () => {
    document.getElementById('tab4').checked = true;
  });
  document.getElementById('btnContinuar4').addEventListener('click', () => {
    document.getElementById('tab5').checked = true;
  });
  document.getElementById('btnContinuar5').addEventListener('click', () => {
    document.getElementById('tab6').checked = true;
  });
  document.getElementById('btnContinuar6').addEventListener('click', () => {
    document.getElementById('tab7').checked = true;
  });
  document.getElementById('btnContinuar7').addEventListener('click', () => {
    document.getElementById('tab8').checked = true;
  });
  //VOLVER
  document.getElementById('btnVolver').addEventListener('click', () => {
    document.getElementById('tab1').checked = true;
  });
  document.getElementById('btnVolver2').addEventListener('click', () => {
    document.getElementById('tab2').checked = true;
  });
  document.getElementById('btnVolver3').addEventListener('click', () => {
    document.getElementById('tab3').checked = true;
  });
  document.getElementById('btnVolver4').addEventListener('click', () => {
    document.getElementById('tab4').checked = true;
  });
  document.getElementById('btnVolver5').addEventListener('click', () => {
    document.getElementById('tab5').checked = true;
  });
  document.getElementById('btnVolver6').addEventListener('click', () => {
    document.getElementById('tab6').checked = true;
  });
  document.getElementById('btnVolver7').addEventListener('click', () => {
    document.getElementById('tab7').checked = true;
  });
  function validateRange() {
      const select = document.getElementById('succions');
      const feedback = document.getElementById('feedback');
      const value = parseInt(select.value);
      var caudalms=(caudal/3600);
      var verificar = (4*caudalms)/(Math.PI*(Math.pow((value/1000), 2)));
      //alert(verificar);
      feedback.innerHTML = '';
      const circle = document.createElement('span');
      circle.classList.add('circle');
      const message = document.createElement('span');
      if (verificar<=1.8) {
        circle.classList.add('green');
        message.textContent = 'Aceptable según el rango';
      } else {
        circle.classList.add('red');
        message.textContent = 'Fuera del rango aceptable';
      }
      feedback.appendChild(circle);
      feedback.appendChild(message);/**/
    }
    function validateRangeImp() {
      const select = document.getElementById('impulsions');
      const feedback = document.getElementById('feedback2');
      const value = parseInt(select.value);
      var caudalms=(caudal/3600);
      var verificar = (4*caudalms)/(Math.PI*(Math.pow((value/1000), 2)));
      //alert(verificar);
      feedback.innerHTML = '';
      const circle = document.createElement('span');
      circle.classList.add('circle');
      const message = document.createElement('span');
      if (verificar<=3) {
        circle.classList.add('green');
        message.textContent = 'Aceptable según el rango';
      } else {
        circle.classList.add('red');
        message.textContent = 'Fuera del rango aceptable';
      }
      feedback.appendChild(circle);
      feedback.appendChild(message);
    }
  function toggleHelpTooltip(id) {
    const tooltip = document.getElementById(id);
    if (tooltip.style.display === 'block') {
      tooltip.style.display = 'none';
    } else {
      tooltip.style.display = 'block';
    }
  }
  function combinePhoneNumber() {
    var countryCode = document.getElementById('countryCode').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    var fullPhoneNumber = countryCode + ' ' + phoneNumber;
    document.getElementById('telefono').value = fullPhoneNumber;
  }
  // Obtener los elementos
  const privadaRadio = document.getElementById('privada');
  const publicaRadio = document.getElementById('publica');
  const tiempoInput = document.getElementById('tiempo');
  const profundidadInput = document.getElementById('profundidad');
  const profundidad2Input = document.getElementById('profundidad-irregular');
  const caudalmInput = document.getElementById('caudalm');
  const caudallInput = document.getElementById('caudall');
  var caudal=0;
  function caudalrec(){
    const volumenInput = document.getElementById('volumen');
    const tiemp = parseFloat(tiempoInput.value);
    const vol = parseFloat(volumenInput.value);
    caudal= vol/tiemp;
    caudalmInput.value = caudal.toFixed(3) + " m³/h";
    caudallInput.value = ((caudal * 1000) / 3600).toFixed(3) + " L/s";
  }
  function radiotiempo() {
    if (regularRadio.checked){
      const prof = parseFloat(profundidadInput.value);
      if (privadaRadio.checked) {
        if (prof <= 0.6) {
          tiempoInput.value = 4;
        } else if (prof > 0.6 && prof <= 1.5) {
          tiempoInput.value = 8;
        } else if (prof > 1.5) {
          tiempoInput.value = 8;
        }
      } else if (publicaRadio.checked) {
        if (prof <= 0.6) {
          tiempoInput.value = 2;
        } else if (prof > 0.6 && prof <= 1.5) {
          tiempoInput.value = 6;
        } else if (prof > 1.5) {
          tiempoInput.value = 9;
        }
      }
    } else if (irregularRadio.checked){
      const prof = parseFloat(profundidad2Input.value);
      if (privadaRadio.checked) {
        if (prof <= 0.6) {
          tiempoInput.value = 4;
        } else if (prof > 0.6 && prof <= 1.5) {
          tiempoInput.value = 8;
        } else if (prof > 1.5) {
          tiempoInput.value = 8;
        }
      } else if (publicaRadio.checked) {
        if (prof <= 0.6) {
          tiempoInput.value = 2;
        } else if (prof > 0.6 && prof <= 1.5) {
          tiempoInput.value = 6;
        } else if (prof > 1.5) {
          tiempoInput.value = 9;
        }
      }
    }
    //caudalrec();
  }
  privadaRadio.addEventListener('change', radiotiempo);
  publicaRadio.addEventListener('change', radiotiempo);
  /*profundidadInput.addEventListener('input', radiotiempo);
  profundidad2Input.addEventListener('input', radiotiempo);*/
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
  //Obtener
  function paso3() {
    var largo = document.getElementById('largo').value;
    var ancho = document.getElementById('ancho').value;
    var longitud = document.getElementById('longitud').value;
    var profundidad = document.getElementById('profundidad').value;
    var profundidad2 = document.getElementById('profundidad-irregular').value;
    if (regularRadio.checked) {
      var area = largo*ancho;
      var perimetro = (2*largo)+(2*ancho);
      var volumen = largo*ancho*profundidad;
      document.getElementById('area').value = area;
      document.getElementById('perimetro').value = perimetro;
      document.getElementById('volumen').value = volumen;
      document.getElementById('prof').value = profundidad;
    } else if (irregularRadio.checked) {
      document.getElementById('perimetro').value = longitud;
      document.getElementById('prof').value = profundidad2;
    }
  }
    //Obtener
    var caudalms=0;
    var diametros=0;
    var diametroi=0;
    function paso5() {
      caudalms=caudal/3600;
      document.getElementById('caudalms').value = caudalms;
      diametros = ((Math.sqrt((4 * caudalms) / (Math.PI * 1.8)))*1000).toFixed(3);
      diametroi = ((Math.sqrt((4 * caudalms) / (Math.PI * 3)))*1000).toFixed(3);
      document.getElementById('succion').value = diametros + " mm";
      document.getElementById('impulsion').value = diametroi + " mm";
      /*alert(diametros);
      alert(diametroi);*/
  }
  function paso6(){
    var area = document.getElementById('area').value;
    document.getElementById('skimmerm').value = area/50;
    document.getElementById('drenm').value = 2;
    document.getElementById('retornom').value = (area*2)/50;

  }
  // Función para mostrar/ocultar campos según la selección
  function toggleFields() {
    if (regularRadio.checked) {
      regularFields.style.display = 'flex';
      irregularFields.style.display = 'none';
      // Habilitar campos de Regular
      profundidadRegular.disabled = false;
      largoRegular.disabled = false;
      anchoRegular.disabled = false;
      // Deshabilitar campos de Irregular
      profundidadIrregular.disabled = true;
      longitudIrregular.disabled = true;
    } else if (irregularRadio.checked) {
      regularFields.style.display = 'none';
      irregularFields.style.display = 'flex';
      // Habilitar campos de Irregular
      profundidadIrregular.disabled = false;
      longitudIrregular.disabled = false;
      // Deshabilitar campos de Regular
      profundidadRegular.disabled = true;
      largoRegular.disabled = true;
      anchoRegular.disabled = true;
    }
  }
  regularRadio.addEventListener('change', toggleFields);
  irregularRadio.addEventListener('change', toggleFields);
  toggleFields();

  // Obtener los elementos
  const forma1radio = document.getElementById('forma1');
  const forma2radio = document.getElementById('forma2');
  const forma1Fields = document.getElementById('forma1-fields');
  const forma2Fields = document.getElementById('forma2-fields');

  const areaf = document.getElementById('areaf');
  const velocidadf = document.getElementById('velocidadf');
  const filtro = document.getElementById('filtro');

  const velocidadf2 = document.getElementById('velocidadf2');
  const diametrof = document.getElementById('diametrof');
  const filtro2 = document.getElementById('filtro2');

  // Función para mostrar/ocultar campos según la selección
  function toggleFields2() {
    if (forma1radio.checked) {
      forma1Fields.style.display = 'flex';
      forma2Fields.style.display = 'none';
      // Habilitar campos de Regular
      areaf.disabled = false;
      velocidadf.disabled = false;
      filtro.disabled = false;
      // Deshabilitar campos de Irregular
      velocidadf2.disabled = true;
      diametrof.disabled = true;
      filtro2.disabled = true;
    } else if (forma2radio.checked) {
      forma1Fields.style.display = 'none';
      forma2Fields.style.display = 'flex';
      // Habilitar campos de Irregular
      velocidadf2.disabled = false;
      diametrof.disabled = false;
      filtro2.disabled = false;
      // Deshabilitar campos de Regular
      areaf.disabled = true;
      velocidadf.disabled = true;
      filtro.disabled = true;
    }
  }
  forma1radio.addEventListener('change', toggleFields2);
  forma2radio.addEventListener('change', toggleFields2);
  toggleFields2();

  function v_filtrado(){
    var vel = caudal/areaf.value;
    document.getElementById('velocidadf').value = vel;
  }
  areaf.addEventListener('input', v_filtrado);
  function d_filtro(){
    var d_fil= ((Math.sqrt((4 * caudal) / (Math.PI * velocidadf2.value)))*1000).toFixed(2);
    document.getElementById('diametrof').value = d_fil;
  }
  velocidadf2.addEventListener('input', d_filtro);
</script>
@endsection