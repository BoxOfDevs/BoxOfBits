<?php

/*
*  ____             ____   __ ____  _ _       
* |  _ \           / __ \ / _|  _ \(_) |      
* | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
* |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
* | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
* |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
* 
* The growing plugin with so many features
*
* @author BoxOfDevs Team
* @link http://boxofdevs.x10host.com/
* 
*/

namespace BoxOfBits\utils;

use pocketmine\utils\TextFormat as TF;

class SymbolFormat{

    public static function MessageTF($message){
        $symbol = "&";
        $message = str_replace($symbol . "0", TF::BLACK, $message);
        $message = str_replace($symbol . "1", TF::DARK_BLUE, $message);
        $message = str_replace($symbol . "2", TF::DARK_GREEN, $message);
        $message = str_replace($symbol . "3", TF::DARK_AQUA, $message);
        $message = str_replace($symbol . "4", TF::DARK_RED, $message);
        $message = str_replace($symbol . "5", TF::DARK_PURPLE, $message);
        $message = str_replace($symbol . "6", TF::GOLD, $message);
        $message = str_replace($symbol . "7", TF::GRAY, $message);
        $message = str_replace($symbol . "8", TF::DARK_GRAY, $message);
        $message = str_replace($symbol . "9", TF::BLUE, $message);
        $message = str_replace($symbol . "a", TF::GREEN, $message);
        $message = str_replace($symbol . "b", TF::AQUA, $message);
        $message = str_replace($symbol . "c", TF::RED, $message);
        $message = str_replace($symbol . "d", TF::LIGHT_PURPLE, $message);
        $message = str_replace($symbol . "e", TF::YELLOW, $message);
        $message = str_replace($symbol . "f", TF::WHITE, $message);
        $message = str_replace($symbol . "k", TF::OBFUSCATED, $message);
        $message = str_replace($symbol . "l", TF::BOLD, $message);
        $message = str_replace($symbol . "m", TF::STRIKETHROUGH, $message);
        $message = str_replace($symbol . "n", TF::UNDERLINE, $message);
        $message = str_replace($symbol . "o", TF::ITALIC, $message);
        $message = str_replace($symbol . "r", TF::RESET, $message);
        return $message;
    }

    public static function PopupTF($popup){
        $symbol = "&";
        $popup = str_replace($symbol . "0", TF::BLACK, $popup);
        $popup = str_replace($symbol . "1", TF::DARK_BLUE, $popup);
        $popup = str_replace($symbol . "2", TF::DARK_GREEN, $popup);
        $popup = str_replace($symbol . "3", TF::DARK_AQUA, $popup);
        $popup = str_replace($symbol . "4", TF::DARK_RED, $popup);
        $popup = str_replace($symbol . "5", TF::DARK_PURPLE, $popup);
        $popup = str_replace($symbol . "6", TF::GOLD, $popup);
        $popup = str_replace($symbol . "7", TF::GRAY, $popup);
        $popup = str_replace($symbol . "8", TF::DARK_GRAY, $popup);
        $popup = str_replace($symbol . "9", TF::BLUE, $popup);
        $popup = str_replace($symbol . "a", TF::GREEN, $popup);
        $popup = str_replace($symbol . "b", TF::AQUA, $popup);
        $popup = str_replace($symbol . "c", TF::RED, $popup);
        $popup = str_replace($symbol . "d", TF::LIGHT_PURPLE, $popup);
        $popup = str_replace($symbol . "e", TF::YELLOW, $popup);
        $popup = str_replace($symbol . "f", TF::WHITE, $popup);
        $popup = str_replace($symbol . "k", TF::OBFUSCATED, $popup);
        $popup = str_replace($symbol . "l", TF::BOLD, $popup);
        $popup = str_replace($symbol . "m", TF::STRIKETHROUGH, $popup);
        $popup = str_replace($symbol . "n", TF::UNDERLINE, $popup);
        $popup = str_replace($symbol . "o", TF::ITALIC, $popup);
        $popup = str_replace($symbol . "r", TF::RESET, $popup);
        return $popup;
    }

    public static function TipTF($tip){
        $symbol = "&";
        $tip = str_replace($symbol . "0", TF::BLACK, $tip);
        $tip = str_replace($symbol . "1", TF::DARK_BLUE, $tip);
        $tip = str_replace($symbol . "2", TF::DARK_GREEN, $tip);
        $tip = str_replace($symbol . "3", TF::DARK_AQUA, $tip);
        $tip = str_replace($symbol . "4", TF::DARK_RED, $tip);
        $tip = str_replace($symbol . "5", TF::DARK_PURPLE, $tip);
        $tip = str_replace($symbol . "6", TF::GOLD, $tip);
        $tip = str_replace($symbol . "7", TF::GRAY, $tip);
        $tip = str_replace($symbol . "8", TF::DARK_GRAY, $tip);
        $tip = str_replace($symbol . "9", TF::BLUE, $tip);
        $tip = str_replace($symbol . "a", TF::GREEN, $tip);
        $tip = str_replace($symbol . "b", TF::AQUA, $tip);
        $tip = str_replace($symbol . "c", TF::RED, $tip);
        $tip = str_replace($symbol . "d", TF::LIGHT_PURPLE, $tip);
        $tip = str_replace($symbol . "e", TF::YELLOW, $tip);
        $tip = str_replace($symbol . "f", TF::WHITE, $tip);
        $tip = str_replace($symbol . "k", TF::OBFUSCATED, $tip);
        $tip = str_replace($symbol . "l", TF::BOLD, $tip);
        $tip = str_replace($symbol . "m", TF::STRIKETHROUGH, $tip);
        $tip = str_replace($symbol . "n", TF::UNDERLINE, $tip);
        $tip = str_replace($symbol . "o", TF::ITALIC, $tip);
        $tip = str_replace($symbol . "r", TF::RESET, $tip);
        return $tip;
	}

    public static function OPMessageTF($opmessage){
        $symbol = "&";
        $opmessage = str_replace($symbol . "0", TF::BLACK, $opmessage);
        $opmessage = str_replace($symbol . "1", TF::DARK_BLUE, $opmessage);
        $opmessage = str_replace($symbol . "2", TF::DARK_GREEN, $opmessage);
        $opmessage = str_replace($symbol . "3", TF::DARK_AQUA, $opmessage);
        $opmessage = str_replace($symbol . "4", TF::DARK_RED, $opmessage);
        $opmessage = str_replace($symbol . "5", TF::DARK_PURPLE, $opmessage);
        $opmessage = str_replace($symbol . "6", TF::GOLD, $opmessage);
        $opmessage = str_replace($symbol . "7", TF::GRAY, $opmessage);
        $opmessage = str_replace($symbol . "8", TF::DARK_GRAY, $opmessage);
        $opmessage = str_replace($symbol . "9", TF::BLUE, $opmessage);
        $opmessage = str_replace($symbol . "a", TF::GREEN, $opmessage);
        $opmessage = str_replace($symbol . "b", TF::AQUA, $opmessage);
        $opmessage = str_replace($symbol . "c", TF::RED, $opmessage);
        $opmessage = str_replace($symbol . "d", TF::LIGHT_PURPLE, $opmessage);
        $opmessage = str_replace($symbol . "e", TF::YELLOW, $opmessage);
        $opmessage = str_replace($symbol . "f", TF::WHITE, $opmessage);
        $opmessage = str_replace($symbol . "k", TF::OBFUSCATED, $opmessage);
        $opmessage = str_replace($symbol . "l", TF::BOLD, $opmessage);
        $opmessage = str_replace($symbol . "m", TF::STRIKETHROUGH, $opmessage);
        $opmessage = str_replace($symbol . "n", TF::UNDERLINE, $opmessage);
        $opmessage = str_replace($symbol . "o", TF::ITALIC, $opmessage);
        $opmessage = str_replace($symbol . "r", TF::RESET, $opmessage);
        return $opmessage;
    }

    public static function OPPopupTF($oppopup){
        $symbol = "&";
        $oppopup = str_replace($symbol . "0", TF::BLACK, $oppopup);
        $oppopup = str_replace($symbol . "1", TF::DARK_BLUE, $oppopup);
        $oppopup = str_replace($symbol . "2", TF::DARK_GREEN, $oppopup);
        $oppopup = str_replace($symbol . "3", TF::DARK_AQUA, $oppopup);
        $oppopup = str_replace($symbol . "4", TF::DARK_RED, $oppopup);
        $oppopup = str_replace($symbol . "5", TF::DARK_PURPLE, $oppopup);
        $oppopup = str_replace($symbol . "6", TF::GOLD, $oppopup);
        $oppopup = str_replace($symbol . "7", TF::GRAY, $oppopup);
        $oppopup = str_replace($symbol . "8", TF::DARK_GRAY, $oppopup);
        $oppopup = str_replace($symbol . "9", TF::BLUE, $oppopup);
        $oppopup = str_replace($symbol . "a", TF::GREEN, $oppopup);
        $oppopup = str_replace($symbol . "b", TF::AQUA, $oppopup);
        $oppopup = str_replace($symbol . "c", TF::RED, $oppopup);
        $oppopup = str_replace($symbol . "d", TF::LIGHT_PURPLE, $oppopup);
        $oppopup = str_replace($symbol . "e", TF::YELLOW, $oppopup);
        $oppopup = str_replace($symbol . "f", TF::WHITE, $oppopup);
        $oppopup = str_replace($symbol . "k", TF::OBFUSCATED, $oppopup);
        $oppopup = str_replace($symbol . "l", TF::BOLD, $oppopup);
        $oppopup = str_replace($symbol . "m", TF::STRIKETHROUGH, $oppopup);
        $oppopup = str_replace($symbol . "n", TF::UNDERLINE, $oppopup);
        $oppopup = str_replace($symbol . "o", TF::ITALIC, $oppopup);
        $oppopup = str_replace($symbol . "r", TF::RESET, $oppopup);
        return $oppopup;
    }

    public static function OPTipTF($optip){
        $symbol = "&";
        $optip = str_replace($symbol . "0", TF::BLACK, $optip);
        $optip = str_replace($symbol . "1", TF::DARK_BLUE, $optip);
        $optip = str_replace($symbol . "2", TF::DARK_GREEN, $optip);
        $optip = str_replace($symbol . "3", TF::DARK_AQUA, $optip);
        $optip = str_replace($symbol . "4", TF::DARK_RED, $optip);
        $optip = str_replace($symbol . "5", TF::DARK_PURPLE, $optip);
        $optip = str_replace($symbol . "6", TF::GOLD, $optip);
        $optip = str_replace($symbol . "7", TF::GRAY, $optip);
        $optip = str_replace($symbol . "8", TF::DARK_GRAY, $optip);
        $optip = str_replace($symbol . "9", TF::BLUE, $optip);
        $optip = str_replace($symbol . "a", TF::GREEN, $optip);
        $optip = str_replace($symbol . "b", TF::AQUA, $optip);
        $optip = str_replace($symbol . "c", TF::RED, $optip);
        $optip = str_replace($symbol . "d", TF::LIGHT_PURPLE, $optip);
        $optip = str_replace($symbol . "e", TF::YELLOW, $optip);
        $optip = str_replace($symbol . "f", TF::WHITE, $optip);
        $optip = str_replace($symbol . "k", TF::OBFUSCATED, $optip);
        $optip = str_replace($symbol . "l", TF::BOLD, $optip);
        $optip = str_replace($symbol . "m", TF::STRIKETHROUGH, $optip);
        $optip = str_replace($symbol . "n", TF::UNDERLINE, $optip);
        $optip = str_replace($symbol . "o", TF::ITALIC, $optip);
        $optip = str_replace($symbol . "r", TF::RESET, $optip);
        return $optip;
	}

    public static function WelcomeMessageTF($wmessage){
        $symbol = "&";
        $wmessage = str_replace($symbol . "0", TF::BLACK, $wmessage);
        $wmessage = str_replace($symbol . "1", TF::DARK_BLUE, $wmessage);
        $wmessage = str_replace($symbol . "2", TF::DARK_GREEN, $wmessage);
        $wmessage = str_replace($symbol . "3", TF::DARK_AQUA, $wmessage);
        $wmessage = str_replace($symbol . "4", TF::DARK_RED, $wmessage);
        $wmessage = str_replace($symbol . "5", TF::DARK_PURPLE, $wmessage);
        $wmessage = str_replace($symbol . "6", TF::GOLD, $wmessage);
        $wmessage = str_replace($symbol . "7", TF::GRAY, $wmessage);
        $wmessage = str_replace($symbol . "8", TF::DARK_GRAY, $wmessage);
        $wmessage = str_replace($symbol . "9", TF::BLUE, $wmessage);
        $wmessage = str_replace($symbol . "a", TF::GREEN, $wmessage);
        $wmessage = str_replace($symbol . "b", TF::AQUA, $wmessage);
        $wmessage = str_replace($symbol . "c", TF::RED, $wmessage);
        $wmessage = str_replace($symbol . "d", TF::LIGHT_PURPLE, $wmessage);
        $wmessage = str_replace($symbol . "e", TF::YELLOW, $wmessage);
        $wmessage = str_replace($symbol . "f", TF::WHITE, $wmessage);
        $wmessage = str_replace($symbol . "k", TF::OBFUSCATED, $wmessage);
        $wmessage = str_replace($symbol . "l", TF::BOLD, $wmessage);
        $wmessage = str_replace($symbol . "m", TF::STRIKETHROUGH, $wmessage);
        $wmessage = str_replace($symbol . "n", TF::UNDERLINE, $wmessage);
        $wmessage = str_replace($symbol . "o", TF::ITALIC, $wmessage);
        $wmessage = str_replace($symbol . "r", TF::RESET, $wmessage);
        return $wmessage;
    }

    public static function WelcomePopupTF($wpopup){
        $symbol = "&";
        $wpopup = str_replace($symbol . "0", TF::BLACK, $wpopup);
        $wpopup = str_replace($symbol . "1", TF::DARK_BLUE, $wpopup);
        $wpopup = str_replace($symbol . "2", TF::DARK_GREEN, $wpopup);
        $wpopup = str_replace($symbol . "3", TF::DARK_AQUA, $wpopup);
        $wpopup = str_replace($symbol . "4", TF::DARK_RED, $wpopup);
        $wpopup = str_replace($symbol . "5", TF::DARK_PURPLE, $wpopup);
        $wpopup = str_replace($symbol . "6", TF::GOLD, $wpopup);
        $wpopup = str_replace($symbol . "7", TF::GRAY, $wpopup);
        $wpopup = str_replace($symbol . "8", TF::DARK_GRAY, $wpopup);
        $wpopup = str_replace($symbol . "9", TF::BLUE, $wpopup);
        $wpopup = str_replace($symbol . "a", TF::GREEN, $wpopup);
        $wpopup = str_replace($symbol . "b", TF::AQUA, $wpopup);
        $wpopup = str_replace($symbol . "c", TF::RED, $wpopup);
        $wpopup = str_replace($symbol . "d", TF::LIGHT_PURPLE, $wpopup);
        $wpopup = str_replace($symbol . "e", TF::YELLOW, $wpopup);
        $wpopup = str_replace($symbol . "f", TF::WHITE, $wpopup);
        $wpopup = str_replace($symbol . "k", TF::OBFUSCATED, $wpopup);
        $wpopup = str_replace($symbol . "l", TF::BOLD, $wpopup);
        $wpopup = str_replace($symbol . "m", TF::STRIKETHROUGH, $wpopup);
        $wpopup = str_replace($symbol . "n", TF::UNDERLINE, $wpopup);
        $wpopup = str_replace($symbol . "o", TF::ITALIC, $wpopup);
        $wpopup = str_replace($symbol . "r", TF::RESET, $wpopup);
        return $wpopup;
    }

    public static function WelcomeTipTF($wtip){
        $symbol = "&";
        $wtip = str_replace($symbol . "0", TF::BLACK, $wtip);
        $wtip = str_replace($symbol . "1", TF::DARK_BLUE, $wtip);
        $wtip = str_replace($symbol . "2", TF::DARK_GREEN, $wtip);
        $wtip = str_replace($symbol . "3", TF::DARK_AQUA, $wtip);
        $wtip = str_replace($symbol . "4", TF::DARK_RED, $wtip);
        $wtip = str_replace($symbol . "5", TF::DARK_PURPLE, $wtip);
        $wtip = str_replace($symbol . "6", TF::GOLD, $wtip);
        $wtip = str_replace($symbol . "7", TF::GRAY, $wtip);
        $wtip = str_replace($symbol . "8", TF::DARK_GRAY, $wtip);
        $wtip = str_replace($symbol . "9", TF::BLUE, $wtip);
        $wtip = str_replace($symbol . "a", TF::GREEN, $wtip);
        $wtip = str_replace($symbol . "b", TF::AQUA, $wtip);
        $wtip = str_replace($symbol . "c", TF::RED, $wtip);
        $wtip = str_replace($symbol . "d", TF::LIGHT_PURPLE, $wtip);
        $wtip = str_replace($symbol . "e", TF::YELLOW, $wtip);
        $wtip = str_replace($symbol . "f", TF::WHITE, $wtip);
        $wtip = str_replace($symbol . "k", TF::OBFUSCATED, $wtip);
        $wtip = str_replace($symbol . "l", TF::BOLD, $wtip);
        $wtip = str_replace($symbol . "m", TF::STRIKETHROUGH, $wtip);
        $wtip = str_replace($symbol . "n", TF::UNDERLINE, $wtip);
        $wtip = str_replace($symbol . "o", TF::ITALIC, $wtip);
        $wtip = str_replace($symbol . "r", TF::RESET, $wtip);
        return $wtip;
	}

    public static function WelcomeOPMessageTF($wopmessage){
        $symbol = "&";
        $wopmessage = str_replace($symbol . "0", TF::BLACK, $wopmessage);
        $wopmessage = str_replace($symbol . "1", TF::DARK_BLUE, $wopmessage);
        $wopmessage = str_replace($symbol . "2", TF::DARK_GREEN, $wopmessage);
        $wopmessage = str_replace($symbol . "3", TF::DARK_AQUA, $wopmessage);
        $wopmessage = str_replace($symbol . "4", TF::DARK_RED, $wopmessage);
        $wopmessage = str_replace($symbol . "5", TF::DARK_PURPLE, $wopmessage);
        $wopmessage = str_replace($symbol . "6", TF::GOLD, $wopmessage);
        $wopmessage = str_replace($symbol . "7", TF::GRAY, $wopmessage);
        $wopmessage = str_replace($symbol . "8", TF::DARK_GRAY, $wopmessage);
        $wopmessage = str_replace($symbol . "9", TF::BLUE, $wopmessage);
        $wopmessage = str_replace($symbol . "a", TF::GREEN, $wopmessage);
        $wopmessage = str_replace($symbol . "b", TF::AQUA, $wopmessage);
        $wopmessage = str_replace($symbol . "c", TF::RED, $wopmessage);
        $wopmessage = str_replace($symbol . "d", TF::LIGHT_PURPLE, $wopmessage);
        $wopmessage = str_replace($symbol . "e", TF::YELLOW, $wopmessage);
        $wopmessage = str_replace($symbol . "f", TF::WHITE, $wopmessage);
        $wopmessage = str_replace($symbol . "k", TF::OBFUSCATED, $wopmessage);
        $wopmessage = str_replace($symbol . "l", TF::BOLD, $wopmessage);
        $wopmessage = str_replace($symbol . "m", TF::STRIKETHROUGH, $wopmessage);
        $wopmessage = str_replace($symbol . "n", TF::UNDERLINE, $wopmessage);
        $wopmessage = str_replace($symbol . "o", TF::ITALIC, $wopmessage);
        $wopmessage = str_replace($symbol . "r", TF::RESET, $wopmessage);
        return $wopmessage;
    }

    public static function WelcomeOPPopupTF($woppopup){
        $symbol = "&";
        $woppopup = str_replace($symbol . "0", TF::BLACK, $woppopup);
        $woppopup = str_replace($symbol . "1", TF::DARK_BLUE, $woppopup);
        $woppopup = str_replace($symbol . "2", TF::DARK_GREEN, $woppopup);
        $woppopup = str_replace($symbol . "3", TF::DARK_AQUA, $woppopup);
        $woppopup = str_replace($symbol . "4", TF::DARK_RED, $woppopup);
        $woppopup = str_replace($symbol . "5", TF::DARK_PURPLE, $woppopup);
        $woppopup = str_replace($symbol . "6", TF::GOLD, $woppopup);
        $woppopup = str_replace($symbol . "7", TF::GRAY, $woppopup);
        $woppopup = str_replace($symbol . "8", TF::DARK_GRAY, $woppopup);
        $woppopup = str_replace($symbol . "9", TF::BLUE, $woppopup);
        $woppopup = str_replace($symbol . "a", TF::GREEN, $woppopup);
        $woppopup = str_replace($symbol . "b", TF::AQUA, $woppopup);
        $woppopup = str_replace($symbol . "c", TF::RED, $woppopup);
        $woppopup = str_replace($symbol . "d", TF::LIGHT_PURPLE, $woppopup);
        $woppopup = str_replace($symbol . "e", TF::YELLOW, $woppopup);
        $woppopup = str_replace($symbol . "f", TF::WHITE, $woppopup);
        $woppopup = str_replace($symbol . "k", TF::OBFUSCATED, $woppopup);
        $woppopup = str_replace($symbol . "l", TF::BOLD, $woppopup);
        $woppopup = str_replace($symbol . "m", TF::STRIKETHROUGH, $woppopup);
        $woppopup = str_replace($symbol . "n", TF::UNDERLINE, $woppopup);
        $woppopup = str_replace($symbol . "o", TF::ITALIC, $woppopup);
        $woppopup = str_replace($symbol . "r", TF::RESET, $woppopup);
        return $woppopup;
    }

    public static function WelcomeOPTipTF($woptip){
        $symbol = "&";
        $woptip = str_replace($symbol . "0", TF::BLACK, $woptip);
        $woptip = str_replace($symbol . "1", TF::DARK_BLUE, $woptip);
        $woptip = str_replace($symbol . "2", TF::DARK_GREEN, $woptip);
        $woptip = str_replace($symbol . "3", TF::DARK_AQUA, $woptip);
        $woptip = str_replace($symbol . "4", TF::DARK_RED, $woptip);
        $woptip = str_replace($symbol . "5", TF::DARK_PURPLE, $woptip);
        $woptip = str_replace($symbol . "6", TF::GOLD, $woptip);
        $woptip = str_replace($symbol . "7", TF::GRAY, $woptip);
        $woptip = str_replace($symbol . "8", TF::DARK_GRAY, $woptip);
        $woptip = str_replace($symbol . "9", TF::BLUE, $woptip);
        $woptip = str_replace($symbol . "a", TF::GREEN, $woptip);
        $woptip = str_replace($symbol . "b", TF::AQUA, $woptip);
        $woptip = str_replace($symbol . "c", TF::RED, $woptip);
        $woptip = str_replace($symbol . "d", TF::LIGHT_PURPLE, $woptip);
        $woptip = str_replace($symbol . "e", TF::YELLOW, $woptip);
        $woptip = str_replace($symbol . "f", TF::WHITE, $woptip);
        $woptip = str_replace($symbol . "k", TF::OBFUSCATED, $woptip);
        $woptip = str_replace($symbol . "l", TF::BOLD, $woptip);
        $woptip = str_replace($symbol . "m", TF::STRIKETHROUGH, $woptip);
        $woptip = str_replace($symbol . "n", TF::UNDERLINE, $woptip);
        $woptip = str_replace($symbol . "o", TF::ITALIC, $woptip);
        $woptip = str_replace($symbol . "r", TF::RESET, $woptip);
        return $woptip;
	}

    public static function RulesTF($rules){
        $symbol = "&";
        $rules = str_replace($symbol . "0", TF::BLACK, $rules);
        $rules = str_replace($symbol . "1", TF::DARK_BLUE, $rules);
        $rules = str_replace($symbol . "2", TF::DARK_GREEN, $rules);
        $rules = str_replace($symbol . "3", TF::DARK_AQUA, $rules);
        $rules = str_replace($symbol . "4", TF::DARK_RED, $rules);
        $rules = str_replace($symbol . "5", TF::DARK_PURPLE, $rules);
        $rules = str_replace($symbol . "6", TF::GOLD, $rules);
        $rules = str_replace($symbol . "7", TF::GRAY, $rules);
        $rules = str_replace($symbol . "8", TF::DARK_GRAY, $rules);
        $rules = str_replace($symbol . "9", TF::BLUE, $rules);
        $rules = str_replace($symbol . "a", TF::GREEN, $rules);
        $rules = str_replace($symbol . "b", TF::AQUA, $rules);
        $rules = str_replace($symbol . "c", TF::RED, $rules);
        $rules = str_replace($symbol . "d", TF::LIGHT_PURPLE, $rules);
        $rules = str_replace($symbol . "e", TF::YELLOW, $rules);
        $rules = str_replace($symbol . "f", TF::WHITE, $rules);
        $rules = str_replace($symbol . "k", TF::OBFUSCATED, $rules);
        $rules = str_replace($symbol . "l", TF::BOLD, $rules);
        $rules = str_replace($symbol . "m", TF::STRIKETHROUGH, $rules);
        $rules = str_replace($symbol . "n", TF::UNDERLINE, $rules);
        $rules = str_replace($symbol . "o", TF::ITALIC, $rules);
        $rules = str_replace($symbol . "r", TF::RESET, $rules);
        return $rules;
    }

}

?>
