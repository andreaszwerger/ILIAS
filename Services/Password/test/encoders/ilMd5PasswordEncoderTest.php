<?php
/* Copyright (c) 1998-2014 ILIAS open source, Extended GPL, see docs/LICENSE */

require_once 'Services/Password/classes/encoders/class.ilMd5PasswordEncoder.php';

/**
 * Class ilMd5PasswordEncoderTest
 * @author  Michael Jansen <mjansen@databay.de>
 * @package ServicesPassword
 */
class ilMd5PasswordEncoderTest  extends PHPUnit_Framework_TestCase
{
	/**
	 * @return ilMd5PasswordEncoder
	 */
	public function testInstanceCanBeCreated()
	{
		$encoder = new ilMd5PasswordEncoder();
		$this->assertInstanceOf('ilMd5PasswordEncoder', $encoder);
		return $encoder;
	}

	/**
	 * @depends testInstanceCanBeCreated
	 * @throws ilPasswordException
	 */
	public function testPasswordShouldBeCorrectlyEncoded(ilMd5PasswordEncoder $encoder)
	{
		$this->assertSame(md5('password'), $encoder->encodePassword('password', ''));
	}

	/**
	 * @depends testInstanceCanBeCreated
	 */
	public function testPasswordCanBeVerified(ilMd5PasswordEncoder $encoder)
	{
		$this->assertTrue($encoder->isPasswordValid(md5('password'), 'password', ''));
	}

	/**
	 * @depends testInstanceCanBeCreated
	 * @expectedException ilPasswordException
	 */
	public function testExceptionIsRaisedIfThePasswordExceedsTheSupportedLengthOnEncoding(ilMd5PasswordEncoder $encoder)
	{
		$encoder->encodePassword(str_repeat('a', 5000), '');
	}

	/**
	 * @depends testInstanceCanBeCreated
	 */
	public function testPasswordVerificationShouldFailIfTheRawPasswordExceedsTheSupportedLength(ilMd5PasswordEncoder $encoder)
	{
		$this->assertFalse($encoder->isPasswordValid('encoded', str_repeat('a', 5000), ''));
	}

	/**
	 * @depends testInstanceCanBeCreated
	 */
	public function testNameShouldBeMd5(ilMd5PasswordEncoder $encoder)
	{
		$this->assertEquals('md5', $encoder->getName());
	}
} 