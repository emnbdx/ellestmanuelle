<?php

    class CreationController
    {
		public function buildThemeList()
		{
			$repo = new Repository();
			$themes = $repo->getTheme();

			foreach($themes as $theme)
			{
				echo "<li class=\"cat-item cat-parent\">";
				echo "<a href=\"" . $theme->id . "\"><span>l" . $theme->name . "</span></a>";
				echo "<a href=\"\"><span>(n)</span></a>";
				echo "</li>";
			}
		}

		public function buildTechniqueList()
		{

		}
    }

?>