<?php

namespace App\Enum;

enum StatutJeu: string
{
    case PasCommence = 'pas_commence';
    case EnCours = 'en_cours';
    case Fini = 'fini';
    case SansFin = 'sans_fin';

    public function label(): string
    {
        return match ($this) {
            self::PasCommence => 'Pas commencé',
            self::EnCours => 'En cours',
            self::Fini => 'Fini',
            self::SansFin => 'Sans fin',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PasCommence => 'secondary',
            self::EnCours => 'primary',
            self::Fini => 'success',
            self::SansFin => 'info',
        };
    }
}