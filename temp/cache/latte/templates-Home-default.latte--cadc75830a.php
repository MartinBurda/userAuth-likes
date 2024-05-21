<?php

use Latte\Runtime as LR;

/** source: /root/userAuth-likes/app/Module/Admin/Presenters/templates/Home/default.latte */
final class Template_cadc75830a extends Latte\Runtime\Template
{
	public const Source = '/root/userAuth-likes/app/Module/Admin/Presenters/templates/Home/default.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['post' => '5'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <h1>Můj blog</h1>

    <div class="posts">
';
		foreach ($posts as $post) /* line 5 */ {
			if (!$user->isLoggedIn() && $post->status !== 'ARCHIVED' || $user->isLoggedIn()) /* line 6 */ {
				echo '<div class="post">
                    <h2><a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Post:show', [$post->id])) /* line 8 */;
				echo '">';
				echo LR\Filters::escapeHtmlText($post->title) /* line 8 */;
				echo '</a></h2>
                    
';
				if ($post->image) /* line 10 */ {
					echo '                        <img src="';
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */;
					echo '/';
					echo LR\Filters::escapeHtmlAttr($post->image) /* line 11 */;
					echo '" width="200" alt="Obrázek k článku ';
					echo LR\Filters::escapeHtmlAttr($post->title) /* line 11 */;
					echo '">
';
				}
				echo '                    
                    <div class="date">';
				echo LR\Filters::escapeHtmlText(($this->filters->date)($post->created_at, 'F j, Y')) /* line 14 */;
				echo '</div>
                    <div class="post">';
				echo LR\Filters::escapeHtmlText($post->status) /* line 15 */;
				echo '</div>
                    <p>Počet zhlédnutí: ';
				echo LR\Filters::escapeHtmlText($post->views) /* line 16 */;
				echo '</p>
                    <div>';
				echo LR\Filters::escapeHtmlText(($this->filters->truncate)($post->content, 256)) /* line 17 */;
				echo '</div>
                
            </div>
';
			}

		}

		echo '    </div>

    <div class="pagination">
';
		if ($page > 1) /* line 25 */ {
			echo '            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('default', [1])) /* line 26 */;
			echo '">První</a>
             | 
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('default', [$page - 1])) /* line 28 */;
			echo '">Předchozí</a>
             | 
';
		}
		echo '
        Stránka ';
		echo LR\Filters::escapeHtmlText($page) /* line 32 */;
		echo ' z ';
		echo LR\Filters::escapeHtmlText($lastPage) /* line 32 */;
		echo '

';
		if ($page < $lastPage) /* line 34 */ {
			echo '             | 
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('default', [$page + 1])) /* line 36 */;
			echo '">Další</a>
             | 
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('default', [$lastPage])) /* line 38 */;
			echo '">Poslední</a>
';
		}
		echo '    </div>
';
	}
}
