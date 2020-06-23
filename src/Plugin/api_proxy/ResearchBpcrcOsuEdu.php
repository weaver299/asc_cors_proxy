<?php
namespace Drupal\asc_cors_proxy\Plugin\api_proxy;

use Drupal\api_proxy\Plugin\api_proxy\HttpApiCommonConfigs;
use Drupal\api_proxy\Plugin\HttpApiPluginBase;
use Drupal\Core\Form\SubformStateInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * The Example API.
 *
 * @HttpApi(
 *   id = "asc-bpcrc",
 *   label = @Translation("Example API"),
 *   description = @Translation("Proxies requests to the Example API."),
 *   serviceUrl = "https://research.bpcrc.osu.edu/",
 * )
 */
final class ResearchBpcrcOsuEdu extends HttpApiPluginBase {

  use HttpApiCommonConfigs;

  /**
   * {@inheritdoc}
   */
  public function addMoreConfigurationFormElements(array $form, SubformStateInterface $form_state): array {
    $form['auth_token'] = $this->authTokenConfigForm($this->configuration);
    $form['more_stuff'] = ['#type' => 'textfield', '#title' => $this->t('Extra config')];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  protected function calculateHeaders(array $headers): array {
    // Modify & add new headers. Here you can add the auth token.
    return $new_headers;
  }

  /**
   * {@inheritdoc}
   */
  public function postprocessOutgoing(Response $response): Response {
    // Modify the response from the API.
    // A common problem is to remove the Transfer-Encoding header.
    // $response->headers->remove('transfer-encoding');
    return $response;
  }

}