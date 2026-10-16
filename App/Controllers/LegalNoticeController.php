<?php
/**
 * @file LegalNoticeController.php
 * @brief Contrôleur de la page des mentions légales.
 *
 * Il affiche la vue dédiée aux informations légales et réglementaires
 * relatives au site.
 *
 * @author Brandon
 * @author Aymen
 * @author Imen
 * @author Milan
 * @date 2026
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Views\LegalNotice\LegalNoticeView;

/**
 * @brief Contrôleur de la page des mentions légales.
 *
 * Il affiche la vue dédiée aux informations légales et réglementaires
 * relatives au site.
 */
class LegalNoticeController
{
    /**
     * @brief Affiche la page des mentions légales.
     */
    public function execute(): void
    {
        (new LegalNoticeView())->show();
    }
}
