<?php


/**
 * Génère la liste des codes de pays pour les numéros de téléphone.
 *
 * @param string $id L'identifiant unique du champ de formulaire.
 * @return string HTML de la liste des codes de pays.
 */
function renderCountryCodeList($id)
{
  $countryCodes = [
    ['code' => '+221', 'country' => 'Sénégal'],
    ['code' => '+225', 'country' => 'Côte d\'Ivoire'],
    ['code' => '+226', 'country' => 'Burkina Faso'],
  ];

  $listHtml = '';
  foreach ($countryCodes as $country) {
    $listHtml .= sprintf(
      '<div class="px-4 py-2 hover:bg-gray-600 cursor-pointer text-nowrap" onclick="selectCountryCode(\'%s\', \'%s\')">%s (%s)</div>',
      escapeHtml($id),
      escapeHtml($country['code']),
      escapeHtml($country['code']),
      escapeHtml($country['country'])
    );
  }

  return $listHtml;
}


/**
 * Rend un champ pour les numéros de téléphone avec une liste des codes de pays.
 *
 * @param array $params Paramètres du champ.
 * @return string HTML du champ généré.
 */
function renderPhoneField($num)
{
  return "Phone input $num";
}
