<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CommentBundle;

use Sonata\CoreBundle\Form\FormHelper;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class SonataCommentBundle.
 *
 * This is the Sonata comment bundle class for Symfony extending from FOSCommentBundle
 */
class SonataCommentBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSCommentBundle';
    }

    public function build(ContainerBuilder $container)
    {
        $this->registerFormMapping();
    }

    public function boot()
    {
        $this->registerFormMapping();
    }

    /**
     * Register form mapping information.
     *
     * NEXT_MAJOR: remove this method
     */
    public function registerFormMapping()
    {
        if (class_exists(FormHelper::class)) {
            FormHelper::registerFormTypeMapping([
                'fos_comment_comment' => 'FOS\CommentBundle\Form\CommentType',
                'fos_comment_commentable_thread' => 'FOS\CommentBundle\Form\CommentableThreadType',
                'fos_comment_delete_comment' => 'FOS\CommentBundle\Form\DeleteCommentType',
                'fos_comment_thread' => 'FOS\CommentBundle\Form\ThreadType',
                'fos_comment_vote' => 'FOS\CommentBundle\Form\VoteType',
                'sonata_comment_comment' => 'Sonata\CommentBundle\Form\Type\CommentType',
                'sonata_comment_status' => 'Sonata\CommentBundle\Form\Type\CommentStatusType',
            ]);
        }
    }
}
