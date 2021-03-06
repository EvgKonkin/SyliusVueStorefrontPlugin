<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\SyliusVueStorefrontPlugin\Command\Cart;

use BitBag\SyliusVueStorefrontPlugin\Command\CommandInterface;
use BitBag\SyliusVueStorefrontPlugin\Model\Request\Cart\CartItem;

class UpdateCart implements CommandInterface
{
    /** @var string|null */
    protected $token;

    /** @var string|null */
    protected $cartId;

    /** @var string */
    protected $orderItemUuid;

    /** @var CartItem */
    protected $cartItem;

    public function __construct(?string $token, ?string $cartId, CartItem $cartItem)
    {
        $this->token = $token;
        $this->cartId = $cartId;
        $this->cartItem = $cartItem;
    }

    public function token(): ?string
    {
        return $this->token;
    }

    public function cartId(): ?string
    {
        return $this->cartId;
    }

    public function cartItem(): CartItem
    {
        return $this->cartItem;
    }

    public function productOptions(): array
    {
        return $this->cartItem()->product_option->extension_attributes->configurable_item_options ?? [];
    }

    public function getOrderItemUuid(): string
    {
        return $this->orderItemUuid;
    }

    public function setOrderItemUuid(string $orderItemUuid): void
    {
        $this->orderItemUuid = $orderItemUuid;
    }
}
