<?php

class BaseModel extends \Phalcon\Mvc\Model
{
    use Timestamp;

    // --------------------------------------------------------------

    public function onConstruct()
    {
        $this->di = \Phalcon\DI\FactoryDefault::getDefault();
    }

    // --------------------------------------------------------------

    /**
     * Returns a list of errors
     *
     * @return boolean|string
     */
    public function getMessagesString()
    {
        if ($this->getMessages()) {
            return implode(', ', $this->getMessages());
        }
        return false;
    }

    // --------------------------------------------------------------

    /**
     * Returns a HTML formatted list of errors
     *
     * @return boolean|string
     */
    public function getMessagesList()
    {
        if (!$this->getMessages()) {
            return false;
        }

        $output = '<ul>';
        foreach ($this->getMessages() as $message) {
            $output .= sprintf('<li>%s</li>', $message);
        }
        $output .= '</ul>';
        return $output;
    }

    // --------------------------------------------------------------

    /**
     * Get the date offset
     *
     * @param  mixed  $field (Optional: created_at, updated_at, etc)
     *                       uses now by default
     *
     * @return string
     */
    function getOffset($field = false)
    {
        $use = 'now';
        if ($field && property_exists($this, $field)) {
            $use = $this->{$field};
        }

        $session = $this->di->getSession();
        $timezone = strtolower($session->get('timezone'));

        $time = strtotime($use);

        $offset = 0;
        if ($timezone && $timezone != 'utc')
        {
            $userDateTime = new DateTime($use, new \DateTimeZone($timezone));
            $offset = $userDateTime->getOffset();
        }

        $userTime = (int) ($time + $offset);
        return date('F jS, Y h:ia', $userTime);
    }

    // --------------------------------------------------------------

}

trait TimeStamp
{

    // --------------------------------------------------------------

    public function beforeCreate()
    {
        $this->created_at = date('Y-m-d H:i:s');
    }

    // --------------------------------------------------------------

    public function beforeUpdate()
    {
        $this->updated_at = date('Y-m-d H:i:s');
    }

    // --------------------------------------------------------------

}


// End of File
// --------------------------------------------------------------