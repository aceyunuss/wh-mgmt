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
   * @var array
   */
  protected $helpers = [];

  /**
   * Be sure to declare properties for any property fetch you initialized.
   * The creation of dynamic property is deprecated in PHP 8.2.
   */
  // protected $session;

  /**
   * Constructor.
   */
  public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
  {
    // Do Not Edit This Line
    parent::initController($request, $response, $logger);

    // Preload any models, libraries, etc, here.

    // E.g.: $this->session = \Config\Services::session();
  }

  public function template($view = "", $title = "", $data = [])
  {

    $parts = explode(' ', session()->get('nama'));
    $initials = '';
    foreach ($parts as $part) {
      $initials .= $part[0];
    }
    $data['usr'] = session()->get();
    $data['message'] = session()->get('message') ?? [];
    $data['usr']['as'] = $initials;
    $pas['content'] = $view;
    $pas['site_title'] = "Warehouse";
    $pas['site_subtitle'] = explode("/", $title)[0];
    $pas['site_subtitle2'] = (explode("/", $title)[1]) ?? "";

    $pas['subpage'] = strtolower(str_replace(" ", "", $pas['site_subtitle']));
    $pas['subpage2'] = strtolower(str_replace(" ", "", $pas['site_subtitle2']));
    $pass = array_merge($pas, $data);
    return view("template_vw", $pass);
  }

  public function setMessage($status, $message)
  {
    $session = session();
    $session->set('message', ["status" => $status, 'msg' => $message]);
  }
}
