<?php

use Latte\Runtime as LR;

/** source: /root/userAuth-likes/app/Module/Admin/Presenters/templates/Post/show.latte */
final class Template_b6bfa331e9 extends Latte\Runtime\Template
{
	public const Source = '/root/userAuth-likes/app/Module/Admin/Presenters/templates/Post/show.latte';

	public const Blocks = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
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
			foreach (array_intersect_key(['comment' => '35'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '    <p><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:default')) /* line 2 */;
		echo '">← zpět na výpis příspěvků</a></p>
    
    
';
		if ($userRating === null) /* line 5 */ {
			echo '            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 1])) /* line 6 */;
			echo '">Líbí se mi!</a>
            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 0])) /* line 7 */;
			echo '">Nelíbí se mi!</a>
';
		} elseif ($userRating === 1) /* line 8 */ {
			echo '            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 0])) /* line 9 */;
			echo '">Nelíbí se mi!</a>
';
		} elseif ($userRating === 0) /* line 10 */ {
			echo '            <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('liked!', [$post->id, 1])) /* line 11 */;
			echo '">Líbí se mi!</a>
';
		}


		echo '    


    <div class="date">';
		echo LR\Filters::escapeHtmlText(($this->filters->date)($post->created_at, 'F j, Y')) /* line 16 */;
		echo '</div>
';
		$this->renderBlock('title', get_defined_vars()) /* line 17 */;
		echo '    <div class="post">';
		echo LR\Filters::escapeHtmlText($post->content) /* line 18 */;
		echo '</div>
    <p>Počet zhlédnutí: ';
		echo LR\Filters::escapeHtmlText($post->views) /* line 19 */;
		echo '</p>

';
		if ($post->image) /* line 21 */ {
			echo '        <img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 22 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($post->image) /* line 22 */;
			echo '" width="200" alt="Obrázek k článku ';
			echo LR\Filters::escapeHtmlAttr($post->title) /* line 22 */;
			echo '">
        <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('deleteImage!', [$post->id])) /* line 23 */;
			echo '">Smazat obrázek</a>
';
		}
		echo '
    <div class="post">';
		echo LR\Filters::escapeHtmlText($post->status) /* line 26 */;
		echo '</div>

    <h2>Komentáře</h2>

';
		if ($post->status !== 'ARCHIVED' && ($post->status !== 'CLOSED' || $user->isLoggedIn())) /* line 30 */ {
			$ʟ_tmp = $this->global->uiControl->getComponent('commentForm');
			if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
			$ʟ_tmp->render() /* line 31 */;

		}
		echo '
    <div class="comments">
';
		foreach ($comments as $comment) /* line 35 */ {
			echo '            <p><b>';
			echo LR\Filters::escapeHtmlText($comment->name) /* line 36 */;
			echo '</b> napsal:</p>
            <div>';
			echo LR\Filters::escapeHtmlText($comment->content) /* line 37 */;
			echo '</div>
';

		}

		echo '    </div>
';
	}


	/** n:block="title" on line 17 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '    <h1>';
		echo LR\Filters::escapeHtmlText($post->title) /* line 17 */;
		echo '</h1>
';
	}
}
