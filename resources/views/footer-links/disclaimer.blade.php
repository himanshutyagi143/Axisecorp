@extends('layouts.app')
@section('content')
   @include('includes.header')
      <div class="layout">
      	@include('includes.sidebar')
			<div class="content">
            <div class="container">
               <div class="row disclaimer_sec">
                  <h2>Disclaimer</h2>
                  <ul>
                     <li>The sole purpose of this website is to provide information regarding the projects of the company. All the information shared on this website which pertains to projects, brochures and marketing collaterals is solely for information purposes only. The visitors are advised not to rely purely on the information for showing their interest.</li>
                     {{--<li>
                        The amenities, specifications, facilities, surrounding infrastructure, stock images and features shown and/or mentioned, and the image renders used herein are purely indicative and for representational purposes and may differ from the actuals. Photographs of interiors, surroundings or location are digitally enhanced unless otherwise mentioned. Not all photos may have been shot at site. Products, features, light fittings, pictures, images, etc. shown as illustrations are for reference only. The colours, shades of walls, tiles etc. shown in the images are for the purpose of representation only and may vary upon actual construction. All images, the interiors and furniture items displayed therein are to give a perspective to the customer and are not part of the Suite/Villa/Flat to be sold to the customer. This is only an invitation to offer and does not constitute an offer. The purpose of this brochure /booklet /prospectus /advertisement /website is, to indicate to the customers the extent of the amenities and facility that may come up in the project as per the present approved layout. Any prospective sale shall strictly be governed by the terms and conditions of the agreement for sale to be entered between the parties. In a project where we are mere development managers, the respective developer/promoter of such project is solely liable and responsible for, inter alia, the construction, title and procuring approvals from competent authorities for such project.
                     </li>
                     <h2>Terms of use</h2>
                     <li>
                        In no event will Axis ecorp And Company Private Limited and its group companies and its entities (for the sake of brevity referred to as "Axis ecorp") be liable for any loss or damages arising from the data provided on this website. The use of any information or material on this website is entirely at the visitor's own risk.
                     </li>
                     <li>
                        The information on this website does not constitute a legal offer and/or contract of any such type between us/the promoter and the visitor.
                     </li>
                     <li>
                        The intellectual property rights, names, marks and copyrights in the artistic style in which they are represented herein either belong to or are owned by or has been permitted to be used by Axis ecorp.
                     </li>
                     <li>
                        This website contains material which is owned by or licensed by/to Axis ecorp and is protected by copyright and intellectual property laws. Reproduction is prohibited without prior permission in writing. Axis ecorp has the right to alter the information of this website without obligation to communicate any changes.
                     </li>
                     <li>
                        A visitor, by the act of submitting information through the website or email will be considered to warrant that he/she has provided true, accurate, current and complete information. By provided/entering mobile number and contact details, a visitor is considered to have consented to Axis ecorp, to send alerts, promotional messages including that of third parties, and the permission to be contacted.
                     </li>
                     <li>
                        Axis ecorp shall make every effort to keep the website free of viruses and other harmful components but does not warrant/guarantee the same. This website and emails from Axis ecorp are vulnerable to data corruption, interception, tampering, viruses as well as delivery error and the visitor accepts the fact that Axis ecorp shall not be liable for any consequences that may arise from them.
                     </li>
                     <li>
                        The designs, plans, specifications, facilities, images, features, etc. shown on this website are only indicative and subject to the approval of the respective authorities.
                     </li>
                     <li>
                        Axis ecorp or any of its employees, managers or representatives shall not be responsible for any damage or economic loss arising out of or related to the use of the website.
                     </li>
                     <li>
                        The website may contain links to other websites which are not under the control of Axis ecorp. Any such links may be accessed by the visitor and Axis ecorp shall not be liable or responsible for the same.
                     </li>
                     <li>
                        We/the promoter reserves the right to change, alter, add or delete any of the specifications mentioned herein without prior permission or notice subject however to the applicable laws.
                     </li>--}}
                  </ul>
               </div>
            </div>

           @include('includes.footer')
@endsection