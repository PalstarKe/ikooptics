<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\{Coverage, Package, Blog, Setting, FAQ, Testimonial, ClientRequest};

class HomeController extends Controller
{
    public function index(): void
    {
        $packages = (new Package())->active();
        $coverageAreas = (new Coverage())->active();
        $testimonials = (new Testimonial())->active();
        $faqs = (new FAQ())->active();
        $blogs = (new Blog())->published();
        $settings = (new Setting())->getGroup('site_');

        $this->view('public/home', compact('packages', 'coverageAreas', 'testimonials', 'faqs', 'blogs', 'settings'));
    }

    public function about(): void
    {
        $settings = (new Setting())->getGroup('about_');
        $this->view('public/about', compact('settings'));
    }

    public function services(): void
    {
        $this->view('public/services');
    }

    public function packages(): void
    {
        $packages = (new Package())->active();
        $this->view('public/packages', compact('packages'));
    }

    public function coverage(): void
    {
        $areas = (new Coverage())->active();
        $this->view('public/coverage', compact('areas'));
    }

    public function checkCoverage(): void
    {
        $area = htmlspecialchars($_POST['area'] ?? '');
        $estate = htmlspecialchars($_POST['estate'] ?? '');
        $phone = htmlspecialchars($_POST['phone'] ?? '');

        $results = (new Coverage())->checkCoverage($area, $estate);
        $this->json(['covered' => !empty($results), 'areas' => $results]);
    }

    public function contact(): void
    {
        $this->view('public/contact');
    }

    public function submitRequest(): void
    {
        if (!$this->validateCsrf()) {
            $this->json(['error' => 'Invalid token'], 403);
            return;
        }

        $data = [
            'name' => htmlspecialchars($_POST['name'] ?? ''),
            'phone' => htmlspecialchars($_POST['phone'] ?? ''),
            'email' => htmlspecialchars($_POST['email'] ?? ''),
            'location' => htmlspecialchars($_POST['location'] ?? ''),
            'service_needed' => htmlspecialchars($_POST['service_needed'] ?? ''),
            'message' => htmlspecialchars($_POST['message'] ?? ''),
            'status' => 'new',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        (new ClientRequest())->create($data);
        $this->json(['success' => true, 'message' => 'Request submitted successfully!']);
    }

    public function blog(): void
    {
        $posts = (new Blog())->published();
        $this->view('public/blog', compact('posts'));
    }

    public function blogPost(string $slug): void
    {
        $post = (new Blog())->findBySlug($slug);
        if (!$post) {
            http_response_code(404);
            $this->view('public/404');
            return;
        }
        $this->view('public/blog-post', compact('post'));
    }
}
