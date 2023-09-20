<?php

namespace Techshop\Review\Test\Unit\Model;

use Techshop\Review\Model\Review;
use Magento\Framework\Exception\LocalizedException;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase
{
    /**
     * @var Review|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $review;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock the Review class and stub necessary methods
        $this->review = $this->getMockBuilder(Review::class)
            ->disableOriginalConstructor() // Prevents calling the original constructor
            ->setMethods(['save']) // Stub the save method
            ->getMock();
    }

    public function testValidateReturnsTrueWhenAllRequiredFieldsAreSet()
    {
        $this->review->setData([
            'comment' => 'Test Comment',
            'rating' => '5',
            'nickname' => 'Test Nickname'
        ]);

        $this->assertTrue($this->review->validate());
    }

    public function testValidateThrowsExceptionWhenFieldsAreMissing()
    {
        $this->expectException(LocalizedException::class);
        $this->expectExceptionMessage('Comment is required.');

        $this->review->validate();
    }

    public function testSetAndGetIsApproved()
    {
        $this->review->setIsApproved(1);
        $this->assertEquals(1, $this->review->getIsApproved());
    }

    public function testApproveSetsIsApprovedToOne()
    {
        // Define behavior of mocked save method
        $this->review->method('save')->willReturnSelf();

        $this->review->approve();
        $this->assertEquals(1, $this->review->getIsApproved());
    }

    public function testDisapproveSetsIsApprovedToZero()
    {
        // Define behavior of mocked save method
        $this->review->method('save')->willReturnSelf();

        $this->review->disapprove();
        $this->assertEquals(0, $this->review->getIsApproved());
    }
}
