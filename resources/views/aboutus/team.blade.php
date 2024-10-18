@extends('layouts.app')

@section('content')
    @include('includes.header')
    <div class="layout">
        @include('includes.sidebar')
        <div class="content">
            <section id="about" class="about section abouttop-content">
                <div class="container">
                    <div class="entry">
                        <p class="entry-text">"Coming together is a beginning. Keeping together is progress. Working together is success." -- Henry Ford</p>

                        <p>We live by this quote. Our team is like a self-fuelling engine and each and every member plays an active part in every aspect of the group. Ideas are always welcome, opinions are appreciated and concepts are treasured. Our team has diverse experience in many fields which eventually helps us in achieving the impossible. The Team is expert in their domains and are absolute professionals with Avant-Garde work ethics.</p>
                    </div>
                </div>
            </section>
            <div class="section-content container team">
                <ul class="news-list">
                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item ">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Raj Kushwaha"
                                                                                 src="{{ URL::asset('frontend/img/team/team-1.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Raj Kushwaha</h4>
                                    <div class="recent-post-time">Chairman</div>
                                    <p>Mr. Kushwaha is a pioneer in Technical Education and founder of Axis chain of Colleges. The campus of Axis College in Kanpur is spread over 63 acres. The college is a leader in Integrated Technical Education and Management. Mr. Kushwaha’s vision is unparallel and he makes sure that his expertise gives value to all businesses alike. His leadership style is participative and he values inputs by one and all. </p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>

				<?php /* ?>
                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3">
								<img alt="Mahendra Kumar Goel" src="{{ URL::asset('frontend/img/team/team-2.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Mahendra Kumar Goel </h4>
                                    <div class="recent-post-time">Director Legal and Corporate Communication</div>
                                    <p>Mr. Goel has worked across industries such as BFSI, Real Estate and even in Government organizations. He is core committee member of chamber of commerce and is also President of Alumni associations of Hans Raj College, University of Delhi and is also founder trustee of ‘Green The Earth’ organization. Mr. Goel is a veteran who brings a lot on on-ground experience to the table. </p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>
					<?php */ ?>

                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Jayprakash Maurya"
                                                                                 src="{{ URL::asset('frontend/img/team/team-3.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Jayprakash Maurya</h4>
                                    <div class="recent-post-time">Director Compliance</div>
                                    <p>Since 1981, Mr. Maurya has been shaping the modern Indian lifestyle. With a vision of changing India’s construction and hospitality landscape, he has reached new heights in the fields of licensing and compliance. Mr. Jayprakash Maurya has been part of several success stories regarding development of various projects in Western and Northern region of India.</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Devesh Kumar"
                                   src="{{ URL::asset('frontend/img/team/team-4.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Devesh Kumar</h4>
                                    <div class="recent-post-time">Director Sales and Marketing</div>
                                    <p>Mr. Kumar has over 22 years of proven track in BFSI, International operations, Pharmaceuticals Startups and Express Service Industry. He is a strategic planner and has time and again proved his abilities in managing business operations and designing strategies. Mr. Kumar has been operational in leading many teams to success. His success stories are revolutionary and are a testament of his relentless persistence to achieve the unachievable.</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Praveen Kushwaha"
                                                                                 src="{{ URL::asset('frontend/img/team/team-5.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Praveen Kushwaha</h4>
                                    <div class="recent-post-time">Director Operations</div>
                                    <p>Mr. Praveen Kushwaha has an engineering degree in Information technology and has more than 20 years of entrepreneurial experience in software development, product planning and execution. He brings an understanding of large scale operational strategy while demonstrating grit in getting the job done. During his career till now, Praveen has been using gold standard practices to set new benchmarks for his competition. </p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Aditya Kushwaha"
                                                                                 src="{{ URL::asset('frontend/img/team/team-6.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Aditya Kushwaha</h4>
                                    <div class="recent-post-time">Director Finance</div>
                                    <p>Master of data analysis, Mr. Aditya Kushwaha has over 15 years of experience in Finance and project execution. Mr Kushwaha brings in his even-killed approach to working with stake holders throughout the business. He has temperament of steel and his charismatic nature makes him a loved individual among all. He has great insight abilities and can create wonders when presented with data.

                                       </p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>


                    <li> 
                        <div class="clearfix visible-sm"></div>
                 <?php /* ?>  <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Ashish Kushwaha"
                                                                                 src="{{ URL::asset('frontend/img/team/team-7.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">

                                    <h4>Ashish Kushwaha </h4>
                                    <div class="recent-post-time">Director Information and Technology</div>
                                    <p>An Entrepreneur and Software Engineer, Mr. Ashish Kushwaha has an experience of more than 15 years in software development and managing large technical teams. His teams love him he is known for his compassion and his never say die attitude. These qualities make him a role model. </p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div> <?php */ ?>
                    </li>

                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
						<?php /* ?>
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Raj Bhatt"
                                 src="{{ URL::asset('frontend/img/team/team-15.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Raj Bhatt</h4>
                                    <div class="recent-post-time">Executive Director Sales</div>
                                    <p>Having more than 15 years of experience in sales and marketing with a master degree in International Marketing and Digital Video & Broadcasting Animation from Delhi University. Mr. Bhatt  is energetic and focused on his goals. He always goes above and beyond.</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
																
                            </div>
							<?php */ ?>
                        </div>
                    </li>
					<?php /* ?>
                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Aninder Singh Sethi"
                                   src="{{ URL::asset('frontend/img/team/team-11.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Aninder Singh Sethi</h4>
                                    <div class="recent-post-time">Executive Director Marketing</div>
                                    <p>Mr. Sethi has 13 years of experience in Design, Marketing & Communications. He looks for new and fitting content that value adds in our marketing platform.</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>
					<?php */ ?>
                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Jyoti Aggarwal"
                                src="{{ URL::asset('frontend/img/team/team-9.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">

                                    <h4>Jyoti Aggarwal </h4>
                                    <div class="recent-post-time">Executive Director</div>
                                    <p>Ms. Aggarwal has a rich experience of 13 years in the field of Accounts and Finance. She lives by the mantra “Success comes from having dreams that are bigger than your fears".</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>
					<?php /* ?>
                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">

                                <div class="image_holder col-sm-4 col-md-3"><img alt="Ankur Agarwal" src="{{ URL::asset('frontend/img/team/team-8.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">

                                    <h4>Ankur Agarwal </h4>
                                    <div class="recent-post-time">VP - Sales And Marketing</div>
                                    <p>Mr Agarwal has 18 years of experience in Sales & Marketing with Real Estate & Mortgages Industry. He  worked earlier with reputed companies like Kotak Mahindra Bank, ING Vysya Bank etc. Always believe in learning & value addition for growth.
                                     </p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>

                            </div>
                        </div>
                    </li>
					<?php */ ?>
					<li>
                        <div class="clearfix visible-sm"></div>
						<?php /* ?>
					    <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Abhishek Sharma"
                                  src="{{ URL::asset('frontend/img/team/team-201.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Abhishek Sharma</h4>
									<div class="recent-post-time">Head Sales</div>
                                   <p>Abhishek Sharma has been working for more than 15 years. He started his career with a leading Telecom (Airtel) as a service person. Soon, he realised that his passion, interest and potential was towards sales. Having realised his bend, he switched over as Salesperson with Reliance General Insurance, which was followed by a successful stint at Future Generali. He has single-handily managed several big corporates and HNI customers. He believes that the beauty of being in sales is that one not only gets to manage sales and revenue but manage the relationships as well.</p>
                                </div>
                            </div>
                        </div>
						<?php */ ?>
					</li>
					
				
					
                    <li>
                        <div class="clearfix visible-sm"></div>
						<?php /* ?>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">

                                <div class="image_holder col-sm-4 col-md-3"><img alt="Balakrishna K" src="{{ URL::asset('frontend/img/team/team-17.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">

                                    <h4>Balakrishna K </h4>
                                    <div class="recent-post-time">Project Manager – Civil</div>
                                    <p>Mr. Balakrishna has 16 years of experience in construction. He is self-driven, passionate and likes to be involved in projects at each and every stage. He has the ability to solve complex technical problems and come up with creative solutions which are safer, more efficient and cost-effective. As a highly capable individual with a strong academic background, Mr. Balakrishna possesses a comprehensive understanding of the technical elements of Civil Engineering.</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>

                            </div>
                        </div>
						<?php */ ?>
                    </li>

					<li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Mr. Raj Bhatt" src="frontend/img/team/team-r23.jpg">
                                </div>
                                <div class="col-sm-8 col-md-9">

                                    <h4>Mr. Raj Bhatt </h4>
                                    <div class="recent-post-time">Executive Director Sales</div>
                                    <p>Mr. Raj Bhatt, brings an impressive 15 years of real estate expertise to our Group. With a proven track record of success in the Delhi NCR region, he has played a pivotal role in our global expansion, especially in the thriving Gulf market. Hailing from the picturesque state of Uttarakhand, Mr. Bhatt embodies the spirit of a determined go-getter. As a mentor and visionary leader, Mr. Bhatt is the driving force behind our company's growth and success. His extensive experience, coupled with his unwavering dedication, continues to inspire us all, His life mantra is "Fulfilling Dreams, Surpassing Expectations!"</p>
                                    
                                </div>
                            </div>
                        </div>
                    </li>

            

                    <li>
                        <div class="clearfix visible-sm"></div>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Surbhi S Arora"
                                  src="{{ URL::asset('frontend/img/team/team-13.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Surbhi S Arora</h4>
                                    <div class="recent-post-time">Executive Director Sales & CRM</div>
                                    <p>Ms. Arora is ambitious and driven by passion. She comes with 11 years of successful experience in the field of CRM and has a master degree from Symbiosis Pune. She thrives on challenge and constantly sets goals for herself. She is not comfortable with settling, and she is always looking for an opportunity to do better and achieve greater heights.</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </li>


                    <li>
                        <div class="clearfix visible-sm"></div>
                       <?php /* ?>
					   <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">
                                <div class="image_holder col-sm-4 col-md-3"><img alt="Gunjan Singh"
                                                                                 src="{{ URL::asset('frontend/img/team/team-14.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <h4>Gunjan Singh</h4>
                                    <div class="recent-post-time">DGM Sales</div>
                                    <p>Ms. Gunjan Singh has 12 years of experience in Banking, Publication house and Real estate. She is skilled in Operations, Sales & Marketing. Meeting the expectations of our consumers with better understanding of consumer needs are some of the factors, which defines our corporate philosophy and business approach. "All our dreams can come true, if we have the courage to pursue them”. </p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
						<?php */ ?>
                    </li>
                    <li>
                        <div class="clearfix visible-sm"></div>
						<?php /* ?>
                        <div class="col-sm-12 col-md-12 wow fadeInUp axisfadeup">
                            <div class="service-item">

                                <div class="image_holder col-sm-4 col-md-3"><img alt="Shilpa Ashok Savardekar" src="{{ URL::asset('frontend/img/team/team-19.jpg') }}">
                                </div>
                                <div class="col-sm-8 col-md-9">

                                    <h4>Shilpa Ashok Savardekar</h4>
                                    <div class="recent-post-time">Asst. Manager – Admin</div>
                                    <p>Ms. Savardekar has 3 years of experience as an executive assistant. Apart from excelling as an executive assistant, she also handles customer relationship and Hospitality. Ms. Savardekar entails to take care of the details around the office and supports the team in a variety of functions. Her major focus lies in managing hotel bookings, registrations and site visits for customers. Outside of work, she is a dog lover. Ms. Savardekar also loves music, travelling, reading, driving and paintings.</p>
                                    {{--<div class="socials">
                                    <a href="#"><span class="fa fa-facebook-square"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-linkedin-square"></span></a>
                                    </div>--}}
                                </div>

                            </div>
                        </div>
						<?php */ ?>
                    </li>
                </ul>
            </div>
    @include('includes.footer')
@endsection