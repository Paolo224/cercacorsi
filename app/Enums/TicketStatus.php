<?php


namespace App\Enums;

enum TicketStatus: string
{
    case IN_ELABORAZIONE = 'In elaborazione';
    case APERTO = 'aperto';
    case CHIUSO = 'chiuso';
    case RESPINTO = 'respinto';
}
