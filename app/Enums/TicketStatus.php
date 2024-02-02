<?php


namespace App\Enums;

enum TicketStatus: string
{
    case APERTO = 'aperto';
    case CHIUSO = 'chiuso';
    case RESPINTO = 'respinto';
}
