<?php
/**
 * Packet class
 *
 */
namespace Ajp;

use \RuntimeException;
use \Ajp\PacketSerializer;
use \Ajp\PacketParser;

abstract class Packet implements PacketInterface
{
    /**
     * @var string $headerCode Header Code
     */
    protected $headerCode;

    /**
     * @var string $type Type
     */
    protected $type;

    /**
     * @var PacketSerializerInterface $serializer Serializer
     */
    protected $serializer;

    /**
     * @var PacketParserInterface $parser Parser
     */
    protected $parser;

    /**
     * Construct
     *
     * @todo move setter calls to DI
     *
     * @param PacketSerializerInterface $serializer
     * @param PacketParserInterface $parser
     */
    public function __construct(PacketSerializerInterface $serializer = null, PacketParserInterface $parser = null)
    {
        $this->setSerializer($serializer);
        $this->setParser($parser);
    }

    /**
     * Get header code
     *
     * @return string
     */
    public function getHeaderCode()
    {
        return $this->headerCode;
    }

    /**
     * Set header code
     *
     * @param $headerCode
     * @return string
     */
    public function setHeaderCode($headerCode)
    {
        return $this->headerCode = $headerCode;
    }

    /**
     * Get Type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set Type
     *
     * @param $type
     * @return string
     */
    public function setType($type)
    {
        return $this->type = $type;
    }

    /**
     * Get Serializer
     *
     * @return PacketSerializerInterface
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * Set Serializer
     *
     * @param PacketSerializerInterface $serializer
     * @return $this
     */
    public function setSerializer(PacketSerializerInterface $serializer = null)
    {
        $this->serializer = isset($serializer) ? $serializer : new static::$serializerClass;
        return $this;
    }

    /**
     * Get Parser
     *
     * @return PacketParserInterface
     */
    public function getParser()
    {
        return $this->parser;
    }

    /**
     * Set Parser
     *
     * @param PacketParserInterface $parser
     * @return $this
     */
    public function setParser(PacketParserInterface $parser)
    {
        $this->parser = isset($parser) ? $parser : new static::$parserClass;
        return $this;
    }
}
