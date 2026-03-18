<?php
// PHP Mailer Script
$status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // REPLACE THIS with your actual email address
    $to = "your-email@example.com"; 
    $subject = "New Portfolio Contact from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // The mail function requires your hosting provider to have mail services enabled
    if (mail($to, $subject, $message, $headers)) {
        $status = "<p class='success'>Message sent successfully! I will get back to you soon.</p>";
    } else {
        $status = "<p class='error'>Failed to send message. Please check your server email configuration.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jatinder | Developer Portfolio</title>
    <style>
        /* Pinterest-Inspired CSS Reset & Variables */
        :root {
            --bg-color: #f9f9f9;
            --card-bg: #ffffff;
            --text-dark: #111111;
            --text-light: #767676;
            --accent: #e60023; /* Pinterest Red */
            --radius: 16px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-dark); line-height: 1.6; }
        a { text-decoration: none; color: inherit; }
        
        /* Sticky Navigation */
        header {
            position: sticky; top: 0; z-index: 1000;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 15px 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex; justify-content: space-between; align-items: center;
        }
        .logo { font-size: 24px; font-weight: bold; letter-spacing: -0.5px; }
        nav ul { display: flex; list-style: none; gap: 20px; }
        nav ul li a { font-weight: 600; padding: 8px 12px; border-radius: 20px; transition: background 0.3s; }
        nav ul li a:hover { background-color: #efefef; }

        /* General Section Styling */
        section { padding: 80px 50px; max-width: 1200px; margin: 0 auto; }
        h2 { font-size: 32px; margin-bottom: 30px; text-align: center; }

        /* Running Slider (Hero Section) */
        .slider-container {
            width: 100%; overflow: hidden; position: relative;
            border-radius: var(--radius);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .slider-track {
            display: flex; transition: transform 0.5s ease-in-out;
        }
        .slide {
            min-width: 100%; position: relative;
        }
        .slide img { width: 100%; height: 500px; object-fit: cover; display: block; }
        .slide-content {
            position: absolute; bottom: 40px; left: 40px;
            background: rgba(255,255,255,0.9); padding: 20px 30px;
            border-radius: var(--radius); max-width: 400px;
        }
        .btn {
            display: inline-block; background: var(--accent); color: white;
            padding: 10px 20px; border-radius: 24px; font-weight: bold;
            margin-top: 15px; transition: opacity 0.3s; border: none; cursor: pointer;
        }
        .btn:hover { opacity: 0.8; }

        /* About Section */
        .about-content { text-align: center; max-width: 800px; margin: 0 auto; font-size: 18px; color: var(--text-light); }

        /* Portfolio Grid (Pinterest Masonry Style Approximation) */
        .portfolio-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;
        }
        .portfolio-card {
            background: var(--card-bg); border-radius: var(--radius); overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s;
        }
        .portfolio-card:hover { transform: translateY(-5px); }
        .portfolio-card img { width: 100%; height: 200px; object-fit: cover; }
        .portfolio-info { padding: 20px; }
        .portfolio-info h3 { margin-bottom: 10px; font-size: 20px; }
        .portfolio-info p { color: var(--text-light); font-size: 14px; margin-bottom: 15px; }

        /* Contact Form */
        .contact-form {
            max-width: 600px; margin: 0 auto; background: var(--card-bg);
            padding: 40px; border-radius: var(--radius); box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .contact-form input, .contact-form textarea {
            width: 100%; padding: 15px; margin-bottom: 20px;
            border: 2px solid #eee; border-radius: 12px; font-size: 16px; outline: none; transition: border 0.3s;
        }
        .contact-form input:focus, .contact-form textarea:focus { border-color: #ccc; }
        .contact-form textarea { height: 150px; resize: vertical; }
        .success { color: green; font-weight: bold; text-align: center; margin-bottom: 20px; }
        .error { color: red; font-weight: bold; text-align: center; margin-bottom: 20px; }

        /* Responsive */
        @media (max-width: 768px) {
            header { flex-direction: column; padding: 15px; }
            nav ul { margin-top: 15px; flex-wrap: wrap; justify-content: center; }
            .slide img { height: 350px; }
            section { padding: 40px 20px; }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Jatinder.</div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#portfolio">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="home" style="padding-top: 20px;">
        <div class="slider-container">
            <div class="slider-track" id="sliderTrack">
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80" alt="QueueIQ Project">
                    <div class="slide-content">
                        <h2>QueueIQ</h2>
                        <p>A smart queue management system designed to streamline waiting times and optimize flow.</p>
                        <a href="#" target="_blank" class="btn">View Project</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80" alt="AIML Analytics">
                    <div class="slide-content">
                        <h2>Predictive Analytics Dashboard</h2>
                        <p>Machine learning models built to forecast trends based on historical data sets.</p>
                        <a href="#" target="_blank" class="btn">View Project</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80" alt="Web Development">
                    <div class="slide-content">
                        <h2>Clean Architecture API</h2>
                        <p>A scalable, RESTful backend service built for high-traffic mobile applications.</p>
                        <a href="#" target="_blank" class="btn">View Project</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <h2>About Me</h2>
        <div class="about-content">
            <p>Hi, I'm Jatinder. I am a developer with a deep focus on Artificial Intelligence and Machine Learning (AIML). I love building intuitive, smart systems that solve real-world problems. When I'm not writing code or training models, I'm constantly exploring new web technologies and clean design patterns.</p>
        </div>
    </section>

    <section id="portfolio">
        <h2>My Portfolio</h2>
        <div class="portfolio-grid">
            
            <div class="portfolio-card">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600&q=80" alt="QueueIQ">
                <div class="portfolio-info">
                    <h3>QueueIQ</h3>
                    <p>Smart queue management application. Reduces wait times using predictive flow algorithms.</p>
                    <a href="#" target="_blank" class="btn" style="padding: 6px 14px; font-size: 14px;">View Live</a>
                </div>
            </div>

            <div class="portfolio-card">
                <img src="https://images.unsplash.com/photo-1555949963-aa79dcee57d5?auto=format&fit=crop&w=600&q=80" alt="Computer Vision">
                <div class="portfolio-info">
                    <h3>Vision Scanner</h3>
                    <p>An image recognition tool that categorizes items in real-time using a custom neural network.</p>
                    <a href="#" target="_blank" class="btn" style="padding: 6px 14px; font-size: 14px;">View Live</a>
                </div>
            </div>

            <div class="portfolio-card">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600&q=80" alt="Data Vis">
                <div class="portfolio-info">
                    <h3>DataViz Hub</h3>
                    <p>Interactive data visualization tool for transforming complex datasets into readable charts.</p>
                    <a href="#" target="_blank" class="btn" style="padding: 6px 14px; font-size: 14px;">View Live</a>
                </div>
            </div>

        </div>
    </section>

    <section id="contact">
        <h2>Get In Touch</h2>
        <?php echo $status; ?>
        <form class="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#contact" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="btn" style="width: 100%;">Send Message</button>
        </form>
    </section>

    <script>
        const track = document.getElementById('sliderTrack');
        const slides = document.querySelectorAll('.slide');
        let currentIndex = 0;

        function moveSlider() {
            currentIndex++;
            if (currentIndex >= slides.length) {
                currentIndex = 0;
            }
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        // Run the slider every 4 seconds
        setInterval(moveSlider, 4000);
    </script>

</body>
</html>