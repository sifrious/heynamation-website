<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebsiteTest extends TestCase
{
    public function test_homepage_renders_company_information_without_cookies(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Heynamation, LLC')
            ->assertSee('Limited liability company')
            ->assertSee('Website privacy notice')
            ->assertSee('href="/styles.css"', false)
            ->assertDontSee('GitHub Pages')
            ->assertDontSee('<script', false);

        $this->assertSame([], $response->headers->getCookies());
    }

    public function test_homepage_lists_projects_contact_and_legal_status(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('href="https://mary.is/"', false)
            ->assertSee('href="https://mary.is/trust"', false)
            ->assertSee('id="projects"', false)
            ->assertSee('id="contact"', false)
            ->assertSee('id="legal"', false)
            ->assertSee('Awaiting approved content');
    }

    public function test_health_check_is_available(): void
    {
        $this->get('/up')->assertOk();
    }

    public function test_unknown_pages_return_not_found(): void
    {
        $this->get('/not-a-page')->assertNotFound();
    }

    public function test_homepage_does_not_accept_form_submissions(): void
    {
        $this->post('/')->assertStatus(405);
    }
}
