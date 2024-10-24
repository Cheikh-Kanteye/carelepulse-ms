<?php

/**
 * Échappe les caractères spéciaux pour être utilisés dans les attributs HTML.
 *
 * @param string $value La valeur à échapper.
 * @return string La valeur échappée.
 */
function escapeHtml($value)
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


/**
 * @return string Le chemin exacte du fichier
 * */
function resolveAssetUrl(string $relativePath, string $baseDir = '/public/assets/icons/'): string
{
  // S'assurer que base directory termine par un slash
  $baseDir = rtrim($baseDir, '/');

  // Construire le chemin complet
  $fullPath = $baseDir . '/' . ltrim($relativePath, '/');

  // TODO utiliser le domaine en production
  $baseUrl = 'http://localhost:3000'; // Dev base url
  $resolvedUrl = $baseUrl . '/' . ltrim($fullPath, '/');

  return $resolvedUrl;
}
