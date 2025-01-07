<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
date_default_timezone_set('Asia/Jakarta');
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }


    // generate slug
    protected function generateSlug(string $text): string
    {
        // Ubah teks menjadi huruf kecil dan ganti semua karakter non-alfanumerik
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9]+/i', '-', trim($text));
        $text = trim($text, '-');
        
        // Tambahkan uniqid dan karakter random yang URL-safe
        $unique_id = uniqid();
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_';
        $random_chars = substr(str_shuffle($characters), 0, 18); // Tambahkan 12 karakter random
        
        // Gabungkan slug akhir dengan uniqid dan karakter acak
        $slug = $text . '-' . $unique_id . '-' . $random_chars;

        return $slug;
    }
}