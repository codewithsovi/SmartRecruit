<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Arsha Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('Arsha')}}/assets/img/favicon.png" rel="icon">
  <link href="{{asset('Arsha')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('Arsha')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('Arsha')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('Arsha')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('Arsha')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('Arsha')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('Arsha')}}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Feb 22 2025 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('Arsha')}}/assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">SR</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#team">Team</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="#about">Login</a>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Smart Recruit</h1>
            <p>Seleksi Tepat, Keputusan Cepat.</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{asset('Arsha')}}/assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="zoom-in">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
        
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              We are a professional recruitment and selection team committed to connecting the right talent with the right opportunities. Our process is designed to ensure efficiency, transparency, and fairness in every stage of hiring.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>We identify and attract qualified candidates based on skills and potential..</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>We conduct structured and objective selection processes.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>We support organizations in building strong and sustainable teams.</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>Our recruitment approach focuses on understanding both company needs and candidate aspirations. Through careful assessment and evaluation, we ensure that every hiring decision contributes to long-term organizational success. </p>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us light-background" data-builder="section">

  <div class="container-fluid">

    <div class="row gy-4">

      <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
          <h3>
            <span>Why Choose Smart Recruit</span>
            <strong>for Employee Recruitment and Selection</strong>
          </h3>
          <p>
            Smart Recruit helps organizations streamline the hiring process by providing
            fast, accurate, and objective recruitment and selection methods.
            Our system is designed to support better decision-making in human resource management.
          </p>
        </div>

        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

          <div class="faq-item faq-active">
            <h3><span>01</span> How does Smart Recruit improve recruitment efficiency?</h3>
            <div class="faq-content">
              <p>
                We automate candidate screening and evaluation processes,
                allowing companies to reduce hiring time while maintaining selection quality.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item">
            <h3><span>02</span> How is candidate selection kept objective and fair?</h3>
            <div class="faq-content">
              <p>
                Candidates are assessed using structured criteria and data-driven evaluations,
                ensuring transparency and minimizing bias in the selection process.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

          <div class="faq-item">
            <h3><span>03</span> Who can benefit from using Smart Recruit?</h3>
            <div class="faq-content">
              <p>
                Smart Recruit is suitable for companies, organizations, and institutions
                that require fast, reliable, and accurate employee recruitment solutions.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div>

        </div>

      </div>

      <div class="col-lg-5 order-1 order-lg-2 why-us-img">
        <img src="{{asset('Arsha')}}/assets/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
      </div>

    </div>

  </div>

</section>
<!-- /Why Us Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Efficient recruitment and selection services to support your hiring needs</p>
      </div><!-- End Section Title -->

     <div class="container">

  <div class="row gy-4">

    <!-- Service 1 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="bi bi-briefcase icon"></i>
        </div>
        <h4><a href="" class="stretched-link">Job Vacancy</a></h4>
        <p>
          Manage and publish job vacancies based on company recruitment needs.
        </p>
      </div>
    </div><!-- End Service Item -->

    <!-- Service 2 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="bi bi-file-earmark-text icon"></i>
        </div>
        <h4><a href="" class="stretched-link">CV Screening</a></h4>
        <p>
          Review and screen candidate resumes to identify the most qualified applicants.
        </p>
      </div>
    </div><!-- End Service Item -->

    <!-- Service 3 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="bi bi-calendar-check icon"></i>
        </div>
        <h4><a href="" class="stretched-link">Interview & Assessment</a></h4>
        <p>
          Conduct interviews and competency assessments according to company standards.
        </p>
      </div>
    </div><!-- End Service Item -->

    <!-- Service 4 -->
    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
      <div class="service-item position-relative">
        <div class="icon">
          <i class="bi bi-person-check icon"></i>
        </div>
        <h4><a href="" class="stretched-link">Hiring & Placement</a></h4>
        <p>
          Select the best candidates and place them in suitable job positions.
        </p>
      </div>
    </div><!-- End Service Item -->

  </div>

</div>
<!-- /Services Section -->

    <!-- Work Process Section -->
    <section id="work-process" class="work-process section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>Recruitment Process</h2>
      <p>
    Our recruitment process ensures a structured, transparent, and effective selection of qualified candidates.
      </p>
      </div>
<!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{asset('Arsha')}}/assets/img/steps/no2.webp" alt="Step 1" class="img-fluid" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">01</div>
                <h3>Application &amp; Screening</h3>
                <p>
                  We collect job applications and screen candidate resumes to ensure they meet the required qualifications.
                </p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Application Review</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>CV Screening</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Initial Qualification Check</span>
                  </div>
                </div>

              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{asset('Arsha')}}/assets/img/steps/no1.webp" alt="Step 2" class="img-fluid" loading="lazy">
              </div>
              <div class="steps-content">
              <div class="steps-number">02</div>
              <h3>Interview &amp; Assessment</h3>
              <p>
                Shortlisted candidates are evaluated through interviews and assessments to measure skills and competencies.
              </p>
              <div class="steps-features">
                <div class="feature-item">
                  <i class="bi bi-check-circle"></i>
                  <span>HR Interview</span>
                </div>
                <div class="feature-item">
                  <i class="bi bi-check-circle"></i>
                  <span>Technical Assessment</span>
                </div>
                <div class="feature-item">
                  <i class="bi bi-check-circle"></i>
                  <span>Competency Evaluation</span>
                </div>
              </div>

              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{asset('Arsha')}}/assets/img/steps/no3.webp" alt="Step 3" class="img-fluid" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">03</div>
                <h3>Hiring &amp; Placement</h3>
                <p>
                  The best candidates are selected, hired, and placed in positions that match their qualifications.
                </p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Final Selection</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Job Offer</span>  
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Employee Placement</span>
                  </div>
                </div>

              </div>
            </div><!-- End Steps Item -->
          </div>

        </div>

      </div>

    </section><!-- /Work Process Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="{{asset('Arsha')}}/assets/img/bg/bg-8.webp" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Start Your Career With Us</h3>
            <p>Join our recruitment process and take the next step in your professional career. We are looking for talented, motivated, and qualified individuals to grow with our organization.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Apply Now</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Team</h2>
    <p>The team behind the Smart Recruit system</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <!-- Sovi -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member d-flex align-items-start">
          <div class="pic">
            <img src="{{asset('Arsha')}}/assets/img/person/no.1.webp" class="img-fluid" alt="">
          </div>
          <div class="member-info">
            <h4>Sovi</h4>
            <span>Backend Developer</span>
            <p>
              Responsible for server-side development, database management,
              and system integration to ensure optimal performance.
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Ikmal -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member d-flex align-items-start">
          <div class="pic">
            <img src="{{asset('Arsha')}}/assets/img/person/no2.webp" class="img-fluid" alt="">
          </div>
          <div class="member-info">
            <h4>Ikmal</h4>
            <span>Frontend Developer</span>
            <p>
              Develops user interfaces and ensures a responsive,
              user-friendly experience across all devices.
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Dimas -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="team-member d-flex align-items-start">
          <div class="pic">
            <img src="{{asset('Arsha')}}/assets/img/person/no3.webp" class="img-fluid" alt="">
          </div>
          <div class="member-info">
            <h4>Dimas</h4>
            <span>Data Analyst</span>
            <p>
              Analyzes recruitment data to generate insights
              that support accurate and effective decision-making.
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Wahyu -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="team-member d-flex align-items-start">
          <div class="pic">
            <img src="{{asset('Arsha')}}/assets/img/person/no.4.webp" class="img-fluid" alt="">
          </div>
          <div class="member-info">
            <h4>Wahyu</h4>
            <span>Data Analyst</span>
            <p>
              Processes and interprets data to support recruitment
              evaluation and performance measurement.
            </p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section>
<!-- /Team Section -->

    <!-- Faq 2 Section -->
  <section id="faq-2" class="faq-2 section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Frequently Asked Questions</h2>
    <p>
      Here are some common questions related to our recruitment and selection process,
      application requirements, and hiring procedures.
    </p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-lg-10">

        <div class="faq-container">

          <!-- FAQ Item 1 -->
          <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>How can I apply for a job?</h3>
            <div class="faq-content">
              <p>
                You can apply by submitting your application and resume through our official
                recruitment website or job portal.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item -->

          <!-- FAQ Item 2 -->
          <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>What documents are required to apply?</h3>
            <div class="faq-content">
              <p>
                Applicants are required to submit a CV or resume. Additional documents such as
                certificates or portfolios may be requested depending on the position.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item -->

          <!-- FAQ Item 3 -->
          <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>What are the stages of the recruitment process?</h3>
            <div class="faq-content">
              <p>
                The recruitment process generally includes application screening, interviews,
                assessments, and final selection.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item -->

          <!-- FAQ Item 4 -->
          <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Will I be informed about my application status?</h3>
            <div class="faq-content">
              <p>
                Yes, shortlisted candidates will be contacted for the next stage of the recruitment
                process. Unfortunately, we may not be able to respond to all applicants.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item -->

          <!-- FAQ Item 5 -->
          <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>How long does the hiring process usually take?</h3>
            <div class="faq-content">
              <p>
                The duration of the hiring process may vary depending on the position and number
                of applicants, but we strive to complete it as efficiently as possible.
              </p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item -->

        </div>

      </div>

    </div>

  </div>

</section><!-- End FAQ-2 Section -->
<!-- /Faq 2 Section -->
    
  </main>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
              <p>
                Subscribe to receive the latest job openings, recruitment updates, and career opportunities.
              </p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">SR</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Gotham Street</p>
            <p>Gotham City</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+62 8568777012</span></p>
            <p><strong>Email:</strong> <span>SmartRecuirt@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
        <h4>Follow Us</h4>
        <p>Follow us on social media to stay updated with new job vacancies and recruitment announcements.</p>
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Arsha</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('Arsha')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('Arsha')}}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('Arsha')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('Arsha')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('Arsha')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('Arsha')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{asset('Arsha')}}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{asset('Arsha')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="{{asset('Arsha')}}/assets/js/main.js"></script>
</body>

</html>