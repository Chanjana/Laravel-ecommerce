<?php
namespace App\Enums;

enum Role: int
{
    case SuperAdministrator = 1;
    case Moderator = 2;
    case SalesManager = 3;
    case MarketingManager = 4;
    case Seller = 5;
    case Buyer = 6;
}
