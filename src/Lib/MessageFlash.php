<?php
namespace App\Covoiturage\Lib;

use App\Covoiturage\Model\HTTP\Session;

class MessageFlash
{
    private static string $cleFlash = "_messagesFlash";

    public static function ajouter(string $type, string $message): void
    {
        $session = Session::getInstance();
        $messages = $session->lire(self::$cleFlash) ?? [];
        
        if (!isset($messages[$type])) {
            $messages[$type] = [];
        }
        $messages[$type][] = $message;
        
        $session->enregistrer(self::$cleFlash, $messages);
    }

    public static function contientMessage(string $type): bool
    {
        $session = Session::getInstance();
        $messages = $session->lire(self::$cleFlash) ?? [];
        return isset($messages[$type]) && count($messages[$type]) > 0;
    }

    public static function lireMessages(string $type): array
    {
        $session = Session::getInstance();
        $messages = $session->lire(self::$cleFlash) ?? [];
        
        if (!isset($messages[$type])) {
            return [];
        }
        
        $messagesType = $messages[$type];
        unset($messages[$type]);
        $session->enregistrer(self::$cleFlash, $messages);
        
        return $messagesType;
    }

    public static function lireTousMessages(): array
    {
        $session = Session::getInstance();
        $messages = $session->lire(self::$cleFlash) ?? [];
        $session->enregistrer(self::$cleFlash, []);
        return $messages;
    }
}