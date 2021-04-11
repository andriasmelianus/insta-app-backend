<?php

namespace App\Alice\Support;

/**
 * Builds standard formatted array of message.
 */

class Message
{
    const INDEX_INFORMATION = 'info-message';
    const INDEX_SUCCESS = 'success-message';
    const INDEX_WARNING = 'warning-message';
    const INDEX_ERROR = 'error-message';

    private $title;

    /**
     * Constructor.
     * 
     * @param string $title
     * @return void
     */
    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    /**
     * Generate standard message response.
     * 
     * @param mixed $message
     * @param string $index
     * @return array
     */
    public function generateMessage($message, string $index = self::INDEX_INFORMATION)
    {
        return [
            'title' => $this->title,
            $index => $message
        ];
    }

    /**
     * Generate standard information message type.
     * 
     * @param mixed $message
     * @return array
     */
    public function generateInformationMessage($message)
    {
        return $this->generateMessage($message, self::INDEX_INFORMATION);
    }

    /**
     * Generate standard success message type.
     * 
     * @param mixed $message
     * @return array
     */
    public function generateSuccessMessage($message)
    {
        return $this->generateMessage($message, self::INDEX_SUCCESS);
    }

    /**
     * Generate standard warning message type.
     * 
     * @param mixed $message
     * @return array
     */
    public function generateWarningMessage($message)
    {
        return $this->generateMessage($message, self::INDEX_WARNING);
    }

    /**
     * Generate standard error message type.
     * 
     * @param mixed $message
     * @return array
     */
    public function generateErrorMessage($message)
    {
        return $this->generateMessage($message, self::INDEX_ERROR);
    }
}
